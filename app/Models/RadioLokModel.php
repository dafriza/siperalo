<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;

class RadioLokModel extends Model
{
     protected $db;
     protected $builder;

     public function __construct() {
        $this->db = Database::connect();
        $this->builder = $this->db->table($this->table);
     }

    protected $DBGroup = 'default';
    protected $table = 'radio_loks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'App\Entities\RadioLokEntity';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
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

    public function user()
    {
        $res = $this->builder
        ->join('pnc','pnc.id = pnc_id')
        ->join('data_asets','data_asets.id = ralok_id')
        ->join('resors','resors.id = resor_id')
        ->get()->getResultArray();
        return $res;
        // $this->hasOne('propertyName', 'model', 'foreign_key', 'local_key');
    }
}
