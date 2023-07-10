<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class ResorSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        for ($i = 0; $i < 20; $i++) {
            $faker = Factory::create('id_ID');
            $data[$i] = [
                'kode_resor' => "STL2.".$i,
                'nama_resor' => $faker->unique()->city(),
            ];
        }
        $this->db->table('resors')->insertBatch($data);
    }
}
