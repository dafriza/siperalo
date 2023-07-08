<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            $faker = Factory::create();
            $data = [
                'username' => $faker->userName,
                'email' => $faker->email,
                // 'password_hash' => password_hash('1',PASSWORD_BCRYPT),
                'password_hash' => '1',
            ];
            $this->db->table('users')->insert($data);
        }
    }
}
