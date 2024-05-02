<?php

namespace App\Controllers\admin\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Santri;
use App\Models\M_Spp;
use App\Models\M_Users;

class C_Spp extends BaseController
{

    public function __construct()
    {
        $this->spp = new M_Spp();
        $this->users = new M_Users();
        $this->santri = new M_Santri();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['spp'] = $this->spp->orderBy('id_spp', 'DESC')->findAll();
        $data['users'] = $this->users->where('role', 'santri')->findAll();
        $data['santri'] = $this->santri->findAll();

        $date = date('Y-m-d');
        $awalTahunIni = date('Y-01-01');
        // Looping data untuk mendapatkan tgl_jatuh_tempo tiap user
        foreach ($data['spp'] as $key => $value) {
            $tglTempo[] = $value->tgl_jatuh_tempo;
            // jika date(tanggal sekarang) melewati tanggal batas tempo status berubah menjadi non aktif, jika tidak melewati maka status aktif
            $status[] = ($date > $tglTempo[$key]) ? 'non aktif' : 'aktif';
        }
        $data['status'] = $status;
        $data['spp_tahun_ini'] = $this->spp->where('tanggal <=', $date)->where('tanggal>=', $awalTahunIni)->selectSum('jumlah')->first()->jumlah;
        return view('bendahara/spp/spp', $data);
    }

    public function show($id)
    {
        $data = $this->santri->where('nama_santri', $id)->first();
        return $this->response->setJSON([
            'success' => $data,
        ]);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());
        $tglTempo = (date('Y') + 1) . '-' . date('02') . '-' . date('01');

        if (!$this->validate([
            'keterangan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong.',
                ],
            ],
            'nis' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'NIS tidak boleh kosong.',
                    'integer' => 'NIS hanya berisi angka.',
                ],
            ],
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                ],
            ],
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelas tidak boleh kosong.',
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
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->spp->insert([
                'keterangan' => $data['keterangan'],
                'jumlah' => $data['jumlah'],
                'nis' => $data['nis'],
                'nama' => $data['nama'],
                'kelas' => $data['kelas'],
                'tanggal' => $data['tanggal'],
                'tgl_jatuh_tempo' => $tglTempo
            ]);
            $this->santri->update($data['id_santri'], [
                'tgl_jatuh_tempo' => $tglTempo,
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['spp'] = $this->spp->find($id);
        // dd($data);
        return view('bendahara/spp/edit', $data);
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
            // The validation failed.
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            // Validation success
            $this->spp->update($id, [
                'keterangan' => $data['keterangan'],
                'jumlah' => $data['jumlah'],
                'tanggal' => $data['tanggal']
            ]);
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/admin/masuk/spp');
        }
    }

    public function delete($id)
    {
        $this->spp->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
