<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class PNCSeeder extends Seeder
{
    public function run()
    {
        $number = 435;
        for ($i = 0; $i < 20; $i++) {
            $faker = Factory::create('id_ID');
            $data = [
                'nipp' => $number.$i+1,
                'nama_pnc' => $faker->unique()->name(),
                'user_id' => $faker->unique()->numberBetween(3, 20)
            ];
            $this->db->table('pnc')->insert($data);
        }
    }
}
