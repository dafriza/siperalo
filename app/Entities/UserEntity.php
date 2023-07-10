<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity
{
    protected $table      = 'users';
	protected $primaryKey = 'id';
    protected $datamap = [];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
    
    function getRole() {
        return $this->arrtributes["role"];
    }
}
