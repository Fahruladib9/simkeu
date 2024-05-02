<?php

namespace App\Controllers\admin\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrKoperasi;

class C_Koperasi extends BaseController
{

    public function __construct()
    {
        $this->koperasi = new M_TrKoperasi();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['koperasi'] = $this->koperasi->orderBy('id_trKoperasi', 'DESC')->findAll();
        $date = date('Y-m-d');
        $awalTahunIni = date('Y-m-01');

        $data['koperasi_bulan_ini'] = $this->koperasi->where('tanggal <=', $date)->where('tanggal>=', $awalTahunIni)->selectSum('jumlah')->first()->jumlah;
        return view('bendahara/koperasi_masuk/koperasi', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());
        if (!$this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal tidak boleh kosong.',
                ],
            ],
            'jumlah' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'Jumlah tidak boleh kosong.',
                    'integer' => 'Jumlah hanya boleh berisi angka',
                ],
            ],
        ])) {
            // Validation failed
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->koperasi->insert([
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['koperasi'] = $this->koperasi->find($id);
        return view('bendahara/koperasi_masuk/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Tanggal tidak boleh kosong.',
                ],
            ],
            'jumlah' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'Jumlah tidak boleh kosong.',
                    'integer' => 'Jumlah hanya boleh berisi angka',
                ],
            ],
        ])) {
            // Validation failed
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->koperasi->update($id, [
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
        }
        $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
        return redirect()->to('/admin/masuk/koperasi');
    }

    public function delete($id)
    {
        $this->koperasi->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
