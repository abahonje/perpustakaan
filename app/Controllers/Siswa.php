<?php

namespace App\Controllers;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->siswaModel = new \App\Models\SiswaModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Data Siswa',
            'menu' => 'siswa',
            'icon' => 'fas fa-user-graduate',
            'siswa' => $this->siswaModel->findAll(),
        ];

        return view('siswa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'menu' => 'siswa',
            'icon' => 'fas fa-user-graduate',
            'validation' => $this->validation,
        ];

        return view('siswa/create', $data);
    }

    public function save()
    {
        $rules = [
            'nis' => [
                'rules' => 'min_length[8]|is_unique[siswa.nis,id,{id}]',
                'errors' => [
                    'min_length' => 'NIS minimal harus 9 karakter!',
                    'is_unique' => 'NIS sudah ada di dalam database!'
                ],
            ],
            'nama' => [
                'rules' => 'min_length[3]',
                'errors' => [
                    'min_length' => 'Nama minimal harus 3 karakter!',
                ],
            ],
            'email' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Alamat email harus valid',
                ],
            ],
            'photo' => [
                'rules' => 'is_image[photo]|max_size[photo,1024]|mime_in[photo,image/png,image/jpeg,image/jpg]',
                'errors' => [
                    'is_image' => 'Yang anda masukkan bukan gambar!',
                    'mime_in' => 'Yang anda masukkan bukan gambar!',
                    'max_size' => 'Ukuran photo terlalu besar, maximal 1MB!',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost();
        $siswa = new \App\Entities\Siswa();
        $siswa->fill($data);
        $siswa->photo = $this->request->getFile('photo');

        $this->siswaModel->save($siswa);

        $db = \Config\Database::connect();
        $row = $db->affectedRows();

        if ($row > 0) {
            session()->setFlashdata('siswa', '<div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Data siswa berhasil ditambahkan ke dalam database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/siswa');
        } else {
            session()->setFlashdata('siswa', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Failed!</strong> Data siswa gagal ditambahkan ke dalam database.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            return redirect()->to('/siswa');
        }
    }

    public function getSiswaById()
    {
        $id = $this->request->getPost('id');
        $siswa = $this->siswaModel->find($id);
        return $this->response->setJSON($siswa);
    }
}
