<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\DataAsetEntity;

class DataAsetModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'data_asets';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\DataAsetEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_ralok','tipe_ralok'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'id_ralok' => 'required',
        'tipe_ralok' => 'required'
    ];
    protected $validationMessages   = [
        'id_ralok' => [
            'required' => 'ID Ralok tidak boleh kosong!'
        ],
        'tipe_ralok' => [
            'required' => 'Tipe Ralok tidak boleh kosong!'
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
