<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class DataAsetSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            $faker = Factory::create();
            $data = [
                'id_ralok' => 'L3'.($i+1),
                'tipe_ralok' => $faker->randomElement(['LSE TAIT', 'SIMOCO']),
            ];
            $this->db->table('data_asets')->insert($data);
        }
    }
}
