<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class RadioLokSeeder extends Seeder
{
    public function run()
    {
        $data = array();
        $faker = Factory::create();
        for ($i = 0; $i < 100; $i++) {
            $data[$i] = [
                'seri_lokomotif' => 'CC-206'.$i,
                'tanggal' => $faker->unique()->dateTimeBetween('-2 month', '+2 month')->format('Y-m-d h:i:s'),
                'approved' => $faker->numberBetween(0,1),
                'ralok_id' => $faker->numberBetween(1, 100),
                'resor_id' => $faker->numberBetween(1, 20),
                'pnc_id' => $faker->numberBetween(2, 20),
                'rtc_call' => $faker->randomElement([0,1]),
                'pc_call' => $faker->randomElement([0,1]),
                'incoming_call' => $faker->randomElement([0,1]),
                'clock_display' => $faker->randomElement([0,1]),
                'channel_section' => $faker->randomElement([0,1]),
                'volume' => $faker->randomElement([0,1]),
                'emergency_call' => $faker->randomElement([0,1]),
                'connector' => $faker->randomElement([0,1]),
            ];
        }
        $this->db->table('radio_loks')->insertBatch($data);
    }
}
