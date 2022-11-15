<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table      = 'siswa';
    protected $returnType     = \App\Entities\Siswa::class;
    protected $allowedFields = ['nis', 'nama', 'jk', 'email', 'kelas', 'no_hp', 'photo'];
}
