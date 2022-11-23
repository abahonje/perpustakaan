<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kategori' => 'Siswa',
                'keterangan' => 'Buku Pegangan Siswa',
            ],
            [
                'kategori' => 'Guru',
                'keterangan' => 'Buku Pegangan Guru',
            ],
            [
                'kategori' => 'Umum',
                'keterangan' => 'Buku Pengetahuan Umum',
            ],
            [
                'kategori' => 'Cerita',
                'keterangan' => 'Buku Cerita Pendek dan Novel',
            ],
        ];

        $this->db->table('kategori')->insertBatch($data);
    }
}
