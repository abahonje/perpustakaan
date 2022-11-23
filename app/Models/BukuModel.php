<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kategori', 'kode', 'judul', 'penerbit', 'tahun', 'stok'];
    protected $returnType = \App\Entities\Buku::class;

    public function getNoBuku()
    {
        $noBuku = $this->builder()
            ->select('kode')
            ->orderBy('kode', 'DESC')
            ->get(1)->getRow();
        if (empty($noBuku)) {
            $noBuku = 0;
        } else {
            $noBuku = $noBuku->kode;
            $nilai = substr($noBuku, 2, 3);
        }
        $nilaiMaks = intval($nilai) + 1;
        $nilaiMaks = str_pad($nilaiMaks, 3, '0', STR_PAD_LEFT);
        $noBuku = 'BK' . $nilaiMaks;
        return $noBuku;
    }
}
