<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'id_kategori' => 1,
                'kode' => 'BK001-S',
                'judul' => 'Pemrograman Dasar Kelas 10',
                'penerbit' => 'PT. Gramedia Utama',
                'tahun' => '2019',
                'stok' => 36,
            ],
            [
                'id_kategori' => 2,
                'kode' => 'BK002-G',
                'judul' => 'Pemrograman Web Kelas 12',
                'penerbit' => 'PT. Erlanga',
                'tahun' => '2020',
                'stok' => 5,
            ],
            [
                'id_kategori' => 3,
                'kode' => 'BK003-U',
                'judul' => 'Menyelam Dasar Samudera PHP',
                'penerbit' => 'PT. Media Komputama',
                'tahun' => '2018',
                'stok' => 3,
            ],
            [
                'id_kategori' => 4,
                'kode' => 'BK004-C',
                'judul' => 'Senandung Senja',
                'penerbit' => 'CV. Putra Mandiri',
                'tahun' => '2015',
                'stok' => 2,
            ],
            [
                'id_kategori' => 1,
                'kode' => 'BK005-S',
                'judul' => 'Matematika Kelas 11',
                'penerbit' => 'PT. Erlangga',
                'tahun' => '2019',
                'stok' => 50,
            ],
        ];

        $this->db->table('buku')->insertBatch($data);
    }
}
