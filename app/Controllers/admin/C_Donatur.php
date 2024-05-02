<?php

namespace App\Controllers\super_admin;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Donatur;

class C_Donatur extends BaseController
{

    public function __construct()
    {
        $this->donatur = new M_Donatur();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['donatur'] = $this->donatur->orderBy('id_donatur', 'DESC')->findAll();
        return view('admin_keuangan/donatur/donatur', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'donatur' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Donatur tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->donatur->insert([
                'donatur' => $data['donatur'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['donatur'] = $this->donatur->find($id);
        // dd($data);
        return view('admin_keuangan/donatur/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'donatur' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Donatur tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->donatur->update($id, [
                'donatur' => $data['donatur'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/donatur');
        }
    }

    public function delete($id)
    {
        $this->donatur->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
