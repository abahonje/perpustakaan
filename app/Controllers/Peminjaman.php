<?php

namespace App\Controllers;

class Peminjaman extends BaseController
{
    public function __construct()
    {
        $this->peminjamanModel = new \App\Models\PeminjamanModel();
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->bukuModel = new \App\Models\BukuModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Peminjaman',
            'menu' => 'peminjaman',
            'icon' => 'fas fa-stamp',
            'peminjaman' => $this->peminjamanModel->getAllPinjam(),
            'siswa' => $this->siswaModel->getSiswa(),
            'buku' => $this->bukuModel->where('stok !=', '0')->findAll(),
            'validation' => $this->validation,
        ];

        return view('peminjaman/index', $data);
    }

    public function save()
    {
        $data = $this->request->getPost();
        $data['id_user'] = '1';
        $data['tgl_pinjam'] = date('Y-m-d H:i:s');
        $pinjam = new \App\Entities\Peminjaman();
        $pinjam->fill($data);
        $pinjam->status = 'aktif';

        $id_buku = $this->request->getPost('id_buku');
        $buku = $this->bukuModel->where('id', $id_buku)->first();
        $stok = $buku->stok;
        $stok = $stok - 1;

        if ($this->peminjamanModel->save($pinjam)) {
            $this->bukuModel->update($id_buku, ['stok' => $stok]);
            session()->setFlashdata('peminjaman', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data peminjaman berhasil ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        } else {
            session()->setFlashdata('peminjaman', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Data peminjaman gagal ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        }
    }

    public function kembali()
    {
        $id = $this->request->uri->getSegment(2);
        $data = [
            'id' => $id,
            'tgl_kembali' => date('Y-m-d H:i:s'),
            'status' => 'nonaktif',
        ];
        $pinjam = new \App\Entities\Peminjaman();
        $pinjam->fill($data);

        // Cari id buku yang terpilih
        $query = $this->peminjamanModel->find($id);
        $id_buku = $query->id_buku;
        $buku = $this->bukuModel->where('id', $id_buku)->first();
        $stok = $buku->stok;
        $stok = $stok + 1;

        if ($this->peminjamanModel->save($pinjam)) {
            $this->bukuModel->update($id_buku, ['stok' => $stok]);
            session()->setFlashdata('peminjaman', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Pengembalian buku berhasil dilakukan.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        } else {
            session()->setFlashdata('peminjaman', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Pengembalian buku gagal dilakukan.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        }
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(2);
        $status = $this->peminjamanModel->find($id)->status;
        if ($status == 'aktif') {
            session()->setFlashdata('peminjaman', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Peminjaman sedang aktif dan tidak dapat dihapus.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        } else {
            $this->peminjamanModel->delete($id);
            session()->setFlashdata('peminjaman', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data peminjaman berhasil dihapus.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/peminjaman');
        }
    }
}
