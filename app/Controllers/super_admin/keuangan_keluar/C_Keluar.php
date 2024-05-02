<?php

namespace App\Controllers\super_admin\keuangan_keluar;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TKeluar;

class C_Keluar extends BaseController
{

    public function __construct()
    {
        $this->keluar = new M_TKeluar();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['keluar'] = $this->keluar->orderBy('id_tKeluar', 'DESC')->findAll();
        $date = date('Y-m-d');
        $awalTahunIni = date('Y-m-01');

        $data['pengeluaran_bulan_ini'] = $this->keluar->where('tanggal <=', $date)->where('tanggal>=', $awalTahunIni)->selectSum('jumlah')->first()->jumlah;
        return view('admin_keuangan/transaksi_keluar/keluar', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());
        if (!$this->validate([
            'keterangan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong.',
                ],
            ],
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
            $this->keluar->insert([
                'keterangan' => $data['keterangan'],
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['keluar'] = $this->keluar->find($id);
        return view('admin_keuangan/transaksi_keluar/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'keterangan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong.',
                ],
            ],
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
            $this->keluar->update($id, [
                'keterangan' => $data['keterangan'],
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
        }
        $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
        return redirect()->to('/keluar');
    }

    public function delete($id)
    {
        $this->keluar->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
