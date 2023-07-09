<?php

namespace App\Database\Seeds;

use Faker\Factory;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 19; $i++) {
            $faker = Factory::create();
            $data = [
                'username' => $faker->userName,
                'password' => password_hash('1',PASSWORD_DEFAULT),
                'role' => 'karyawan'
            ];
            $this->db->table('users')->insert($data);
        }
        $this->db->table('users')->insert([
            'username' => 'super_admin',
            'password' => password_hash('admin',PASSWORD_DEFAULT),
            'role' => 'superadmin'
        ]);
    }
}
