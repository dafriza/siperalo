<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('ResorSeeder');
        $this->call('PNCSeeder');
        $this->call('DataAsetSeeder');
        $this->call('RadioLokSeeder');
    }
}
