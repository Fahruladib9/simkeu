<?php

namespace App\Controllers\admin\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrBarber;

class C_Barber extends BaseController
{

    public function __construct()
    {
        $this->barber = new M_TrBarber();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['barber'] = $this->barber->orderBy('id_trBarber', 'DESC')->findAll();
        $date = date('Y-m-d');
        $awalBulanIni = date('Y-m-01');

        $data['barber_bulan_ini'] = $this->barber->where('tanggal <=', $date)->where('tanggal>=', $awalBulanIni)->selectSum('jumlah')->first()->jumlah;
        return view('bendahara/barber_masuk/barber', $data);
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
            $this->barber->insert([
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['barber'] = $this->barber->find($id);
        return view('bendahara/barber_masuk/edit', $data);
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
            $this->barber->update($id, [
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal'],
            ]);
        }
        $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
        return redirect()->to('/admin/masuk/barber');
    }

    public function delete($id)
    {
        $this->barber->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
