<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'nama'    => 'Abah Onje',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'email' => 'abahonjelearn@gmail.com',
                'level' => 'admin'
            ],
            [
                'username' => 'pustakawan',
                'nama'    => 'Indah Ayu Lestari',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'email' => 'indahayu@gmail.com',
                'level' => 'pustakawan'
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
