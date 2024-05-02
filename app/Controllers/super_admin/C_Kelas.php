<?php

namespace App\Controllers\super_admin;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Kelas;

class C_Kelas extends BaseController
{

    public function __construct()
    {
        $this->kelas = new M_Kelas();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['kelas'] = $this->kelas->orderBy('id_kelas', 'DESC')->findAll();
        return view('admin_keuangan/kelas/kelas', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->kelas->insert([
                'kelas' => $data['kelas'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['kelas'] = $this->kelas->find($id);
        // dd($data);
        return view('admin_keuangan/kelas/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong.',
                ],
            ],
        ])) {
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->kelas->update($id, [
                'kelas' => $data['kelas'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/kelas');
        }
    }

    public function delete($id)
    {
        $this->kelas->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
