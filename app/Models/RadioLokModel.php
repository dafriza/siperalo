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
    protected $validationRules = [
        'seri_lokomotif' => 'required',
        'tanggal' => 'required',
        'approved' => 'permit_empty',
        'ralok_id' => 'required',
        'resor_id' => 'required',
        'pnc_id' => 'required',
        'rtc_call' => 'required',
        'pc_call' => 'required',
        'incoming_call' => 'required',
        'clock_display' => 'required',
        'channel_section' => 'required',
        'volume' => 'required',
        'emergency_call' => 'required',
        'connector' => 'required',
    ];
    protected $validationMessages = [
        'seri_lokomotif' => [
            'required' => 'Seri Lokomotif harus diisi!'
        ],
        'tanggal' => [
            'required' => 'Tanggal harus diisi!'
        ],
        'ralok_id' => [
            'required' => 'Ralok ID harus diisi!'
        ],
        'resor_id' => [
            'required' => 'Resor ID harus diisi!'
        ],
        'pnc_id' => [
            'required' => 'PNC ID harus diisi!'
        ],
        'rtc_call' => [
            'required' => 'RTC Call harus diisi!'
        ],
        'pc_call' => [
            'required' => 'PC Call harus diisi!'
        ],
        'incoming_call' => [
            'required' => 'Incoming Call harus diisi!'
        ],
        'clock_display' => [
            'required' => 'Clock Display harus diisi!'
        ],
        'channel_section' => [
            'required' => 'Channel Section harus diisi!'
        ],
        'volume' => [
            'required' => 'Volume harus diisi!'
        ],
        'emergency_call' => [
            'required' => 'Emergency Call harus diisi!'
        ],
        'connector' => [
            'required' => 'Connector harus diisi!'
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
