<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class PNCSeeder extends Seeder
{
    public function run()
    {
        $number = 435;
        $data = array();
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 19; $i++) {
            $data[$i] = [
                'nipp' => $number.$i+1,
                'nama_pnc' => $faker->unique()->name(),
                'user_id' => $faker->unique()->numberBetween(2, 20)
            ];
        }
        $this->db->table('pnc')->insertBatch($data);
        $this->db->table('pnc')->insert([
            'nipp' => 1,
            'nama_pnc' => 'SUPER ADMIN',
            'user_id' => 1
        ]);
    }
}
