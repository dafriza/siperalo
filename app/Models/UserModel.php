<?php

namespace App\Models;
use Config\Database;
use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'App\Entities\UserEntity';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['username', 'password', 'role'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'username' => 'required',
        'password' => 'required',
        'role' => 'required',
    ];
    protected $validationMessages = [
        'username' => [
            'required' => 'Username tidak boleh kosong!',
        ],
        'password' => [
            'required' => 'Password tidak boleh kosong!',
        ],
        'role' => [
            'required' => 'Role tidak boleh kosong!',
        ],
    ];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    function attempts($data)
    {
        $data_session = [];
        if (empty($data->username)) {
            $data_session['status'] = false;
            return $data_session;
        }
        $username =
            self::where('username', $data->username)
                ->get()
                ->getResultArray()[0] ?? false;
        if (!empty($username)) {
            $password = password_verify($data->password, $username['password']);
            if (!$password) {
                $data_session['status'] = false;
                return $data_session;
            } else {
                $data_session['status'] = true;
                $data_session['data'] = $username;
                return $data_session;
            }
        } else {
            $data_session['status'] = false;
            return $data_session;
        }
    }
}
