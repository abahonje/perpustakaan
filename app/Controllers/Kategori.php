<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategoriModel = new \App\Models\KategoriModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'menu' => 'kategori',
            'icon' => 'fas fa-wallet',
            'kategori' => $this->kategoriModel->findAll(),
        ];

        return view('kategori/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kategori',
            'menu' => 'kategori',
            'icon' => 'fas fa-wallet',
            'validation' => $this->validation,
        ];

        return view('kategori/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'min_length[4]|is_unique[kategori.kategori,id,{id}]',
                'errors' => [
                    'min_length' => 'Kategori minimal harus 4 karakter!',
                    'is_unique' => 'Kategori sudah ada di dalam database!'
                ]
            ],
            'keterangan' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Keterangan minimal harus 5 karakter!',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $kategori = new \App\Entities\Kategori();
        $kategori->fill($data);

        $this->kategoriModel->save($kategori);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('kategori', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data kategori berhasil ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/kategori');
        } else {
            session()->setFlashdata('kategori', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Data kategori gagal ditambahkan ke dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/kategori');
        }
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(2);
        $this->kategoriModel->delete($id);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('kategori', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data kategori berhasil dihapus dari database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/kategori');
        } else {
            session()->setFlashdata('kategori', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Data kategori gagal dihapus dari database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/kategori');
        }
    }

    public function edit()
    {
        $id = $this->request->uri->getSegment(2);
        $kategori = $this->kategoriModel->find($id);
        $data = [
            'title' => 'Edit Data Kategori',
            'menu' => 'kategori',
            'icon' => 'fas fa-wallet',
            'kategori' => $kategori,
            'validation' => $this->validation,
        ];

        return view('kategori/edit', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'min_length[4]|is_unique[kategori.kategori,id,{id}]',
                'errors' => [
                    'min_length' => 'Kategori minimal harus 4 karakter!',
                    'is_unique' => 'Kategori sudah ada di dalam database!'
                ]
            ],
            'keterangan' => [
                'rules' => 'min_length[5]',
                'errors' => [
                    'min_length' => 'Keterangan minimal harus 5 karakter!',
                ]
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $kategori = new \App\Entities\Kategori();
        $kategori->fill($data);

        $this->kategoriModel->save($kategori);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('kategori', '<div class="alert alert-info alert-dismissible fade show" role="alert"><strong>Selamat</strong> Data kategori berhasil diupdate di dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/kategori');
        } else {
            session()->setFlashdata('kategori', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Maaf!</strong> Data kategori gagal diupdate di dalam database.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            return redirect()->to('/kategori');
        }
    }
}
