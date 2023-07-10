<?php

namespace App\Models;

use CodeIgniter\Model;

class PNCModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pnc';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\PNCEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nipp','nama_pnc','user_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nipp' => 'required',
        'nama_pnc' => 'required',
        'user_id' => 'required'
    ];
    protected $validationMessages   = [
        'nipp' => [
            'required' => 'NIPP tidak boleh kosong!'
        ],
        'nama_pnc' => [
            'required' => 'Nama PNC tidak boleh kosong!'
        ],
        'user_id' => [
            'required' => 'User ID tidak boleh kosong!'
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
