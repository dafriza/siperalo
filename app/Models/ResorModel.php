<?php

namespace App\Models;

use CodeIgniter\Model;

class ResorModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'resors';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\ResorEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_resor','kode_resor'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'nama_resor' => 'required',
        'kode_resor' => 'required'
    ];
    protected $validationMessages   = [
        'nama_resor' => [
            'required' => 'Nama Resor tidak boleh kosong!',
        ],
        'kode_resor' => [
            'required' => 'Kode Resor tidak boleh kosong!',
        ]
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
