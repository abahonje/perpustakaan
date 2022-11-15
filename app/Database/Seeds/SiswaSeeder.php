<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nis' => '202110001',
                'nama' => 'Agus Ramdhani',
                'jk' => 'L',
                'email' => 'agusramdhan@gmail.com',
                'kelas' => '12 RPL',
                'no_hp' => '081908190819',
                'photo' => 'default.png',
            ],
            [
                'nis' => '202110002',
                'nama' => 'Ari Dirgantara',
                'jk' => 'L',
                'email' => 'aridirgant@gmail.com',
                'kelas' => '12 RPL',
                'no_hp' => '081908190888',
                'photo' => 'default.png',
            ],
            [
                'nis' => '202110003',
                'nama' => 'Barshena Rusthandi',
                'jk' => 'L',
                'email' => 'barsenarus@gmail.com',
                'kelas' => '12 RPL',
                'no_hp' => '081808778018',
                'photo' => 'default.png',
            ],
            [
                'nis' => '202110004',
                'nama' => 'Chalta Putri Kayla',
                'jk' => 'P',
                'email' => 'chaltacaemn@gmail.com',
                'kelas' => '12 OTKP 2',
                'no_hp' => '087708907890',
                'photo' => 'default.png',
            ],
            [
                'nis' => '202110005',
                'nama' => 'Khairina Munggaran',
                'jk' => 'P',
                'email' => 'khairinmput@gmail.com',
                'kelas' => '12 RPL',
                'no_hp' => '08958779089',
                'photo' => 'default.png',
            ],
        ];

        $this->db->table('siswa')->insertBatch($data);
    }
}
