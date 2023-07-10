<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
class RadioLokEntity extends Entity
{
    protected $table      = 'radio_loks';
	protected $primaryKey = 'id';
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
