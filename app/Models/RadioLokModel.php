<?php

namespace App\Models;

use Config\Database;
use CodeIgniter\Model;
use Tatter\Relations\Traits\ModelTrait;

class RadioLokModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'radio_loks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'App\Entities\RadioLokEntity';
    protected $useSoftDeletes = true;
    protected $protectFields = true;
    protected $allowedFields = ['seri_lokomotif', 'tanggal', 'approved', 'ralok_id', 'resor_id', 'pnc_id', 'rtc_call', 'pc_call', 'incoming_call', 'clock_display', 'channel_section', 'volume', 'emergency_call', 'connector'];

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

    public function user($id = 0, $column_name = null)
    {
        if ($id == 0 || is_null($column_name)) {
            $res = self::select('*,radio_loks.id')
                ->join('pnc', 'pnc.id = pnc_id')
                ->join('data_asets', 'data_asets.id = ralok_id')
                ->join('resors', 'resors.id = resor_id')
                ->findAll();
            return $res;
        } else {
            $res = self::select('*,radio_loks.id')
                ->join('pnc', 'pnc.id = pnc_id')
                ->join('data_asets', 'data_asets.id = ralok_id')
                ->join('resors', 'resors.id = resor_id')
                ->where($column_name, $id)
                ->findAll();
            return $res;
        }
        // $this->hasOne('propertyName', 'model', 'foreign_key', 'local_key');
    }
    function userKaryawan($id)
    {
        $res = self::select('*,radio_loks.id')
            ->join('pnc', 'pnc.id = pnc_id')
            ->join('data_asets', 'data_asets.id = ralok_id')
            ->join('resors', 'resors.id = resor_id')
            ->find($id);
        return $res;
    }
}
