<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $returnType     = \App\Entities\Siswa::class;
    protected $allowedFields = ['nis', 'nama', 'jk', 'email', 'kelas', 'no_hp', 'photo'];

    public function getSiswa()
    {
        $builder = $this->db->table('peminjaman');
        $builder->where('status', 'aktif');
        $builder->select('id_siswa');
        $query = $builder->get()->getResultObject();

        if (empty($query)) {
            $builder = $this->db->table('siswa');
            return $builder->get()->getResultObject();
        }

        $id_siswa = [];
        foreach ($query as $q) {
            $id_siswa[] = $q->id_siswa;
        }
        $builder = $this->db->table('siswa');
        $builder->whereNotIn('id', $id_siswa);
        return $builder->get()->getResultObject();
    }
}
