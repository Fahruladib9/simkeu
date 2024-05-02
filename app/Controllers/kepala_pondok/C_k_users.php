<?php

namespace App\Controllers\kepala_pondok;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Users;

class C_k_users extends BaseController
{

    public function __construct()
    {
        $this->users = new M_Users();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['users'] = $this->users->findAll();
        return view('kepala_pondok/users/users', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                ],
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                ],
            ],
            'tanggal_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong.',
                ],
            ],
            'role' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Role tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->users->insert([
                'username' => $data['username'],
                'password' => date('Y-m-d'),
                'nama' => $data['nama'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'role' => $data['role'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['user'] = $this->users->find($id);
        return view('kepala_pondok/users/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                ],
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                ],
            ],
            'tanggal_lahir' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal lahir tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->users->update($id, [
                'username' => $data['username'],
                'password' => date('Y-m-d'),
                'nama' => $data['nama'],
                'tanggal_lahir' => $data['tanggal_lahir'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/usersKepala');
        }
    }

    public function delete($id)
    {
        $this->users->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
