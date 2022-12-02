<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_siswa', 'id_buku', 'id_user', 'tgl_pinjam', 'tgl_kembali', 'status'];
    protected $returnType = \App\Entities\Peminjaman::class;

    public function getAllPinjam()
    {
        $pinjam = $this->db->query('SELECT peminjaman.*, buku.judul, siswa.nama FROM peminjaman JOIN buku JOIN siswa ON peminjaman.id_siswa=siswa.id AND peminjaman.id_buku=buku.id')->getResultObject();
        return $pinjam;
    }
}
