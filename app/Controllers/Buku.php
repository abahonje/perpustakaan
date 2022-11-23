<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function __construct()
    {
        $this->bukuModel = new \App\Models\BukuModel();
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Buku',
            'menu' => 'buku',
            'icon' => 'fas fa-book',
            'buku' => $this->bukuModel->findAll(),
        ];

        return view('buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Buku',
            'menu' => 'buku',
            'icon' => 'fas fa-book',
            'validation' => $this->validation,
            'getKodeBuku' => $this->bukuModel->getNoBuku(),
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('buku/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Judul buku minimal harus 5 karakter!'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $buku = new \App\Entities\Buku();
        $buku->fill($data);

        $this->bukuModel->save($data);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('buku', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data buku berhasil ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/buku');
        } else {
            session()->setFlashdata('buku', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Data buku gagal ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/buku');
        }
    }

    public function edit()
    {
        $id = $this->request->uri->getSegment(2);

        $data = [
            'title' => 'Edit Data Buku',
            'menu' => 'buku',
            'icon' => 'fas fa-book',
            'validation' => $this->validation,
            'buku' => $this->bukuModel->find($id),
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('buku/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Judul buku minimal harus 5 karakter!'
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $buku = new \App\Entities\Buku();
        $buku->fill($data);

        $this->bukuModel->save($data);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('buku', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data buku berhasil diupdate di dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/buku');
        } else {
            session()->setFlashdata('buku', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Tidak ada perubahan data buku dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/buku');
        }
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(2);
        $this->bukuModel->delete($id);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('buku', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data buku berhasil dihapus dari database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/buku');
        } else {
            session()->setFlashdata('buku', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Data buku gagal dihapus dari database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/buku');
        }
    }
}
