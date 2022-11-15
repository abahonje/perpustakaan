<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'menu' => 'dashboard',
            'icon' => 'fas fa-tachometer-alt',
        ];

        return view('admin/index', $data);
    }
}
