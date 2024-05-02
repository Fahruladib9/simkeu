<?php

namespace App\Controllers\super_admin\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrDonatur;

class C_Donatur extends BaseController
{

    public function __construct()
    {
        $this->trDonatur = new M_TrDonatur();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['donatur'] = $this->trDonatur->orderBy('id_trDonatur', 'DESC')->findAll();
        $date = date('Y-m-d');
        $awalTahunIni = date('Y-m-01');

        $data['donatur_bulan_ini'] = $this->trDonatur->where('tanggal <=', $date)->where('tanggal>=', $awalTahunIni)->selectSum('jumlah')->first()->jumlah;
        return view('admin_keuangan/donatur_masuk/donatur', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());
        $buktiBayar = $this->request->getFile('bukti_bayar');
        if (!$this->validate([
            'nama_perusahaan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan tidak boleh kosong.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Format email tidak sesuai.',
                ],
            ],
            'no_wa' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'No wa tidak boleh kosong.',
                    'integer' => 'No wa hanya boleh berisi angke'
                ],
            ],
            'jenis_bayar' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis bayar tidak boleh kosong.',
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat bayar tidak boleh kosong.',
                ],
            ],
            'bukti_bayar' => [
                'rules'  => 'uploaded[bukti_bayar]|mime_in[bukti_bayar,image/png,image/jpg,image/jpeg]|max_size[bukti_bayar,5120]',
                'errors' => [
                    'uploaded' => 'Bukti bayar tidak boleh kosong',
                    'mime_in' => 'File harus berupa jpg,jpeg,png',
                    'max_size' => 'Ukuran File Maksimal 5 MB'
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
            $newName = $buktiBayar->getRandomName();
            $buktiBayar->move('assets/img/bukti_bayar', $newName);
            $this->trDonatur->insert([
                'nama_perusahaan' => $data['nama_perusahaan'],
                'jumlah' => $data['jumlah'],
                'email' => $data['email'],
                'no_wa' => $data['no_wa'],
                'jenis_bayar' => $data['jenis_bayar'],
                'tanggal' => $data['tanggal'],
                'alamat' => $data['alamat'],
                'bukti_bayar' => $newName,
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['donatur'] = $this->trDonatur->find($id);
        return view('admin_keuangan/donatur_masuk/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());
        $buktiBayar = $this->request->getFile('bukti_bayar');
        $fileName = $this->trDonatur->where('id_trDonatur', $id)->select('bukti_bayar')->first()->bukti_bayar;
        $fileDir = file_exists('assets/img/bukti_bayar/' . $fileName);

        if (!$this->validate([
            'nama_perusahaan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama perusahaan tidak boleh kosong.',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Format email tidak sesuai.',
                ],
            ],
            'no_wa' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'No wa tidak boleh kosong.',
                    'integer' => 'No wa hanya boleh berisi angka'
                ],
            ],
            'jenis_bayar' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis bayar tidak boleh kosong.',
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat bayar tidak boleh kosong.',
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
            if ($buktiBayar->getSize() == 0) {
                // Tidak ada file yang diunggah atau file yang diunggah adalah file kosong
                $this->trDonatur->update($id, [
                    'nama_perusahaan' => $data['nama_perusahaan'],
                    'jumlah' => $data['jumlah'],
                    'email' => $data['email'],
                    'no_wa' => $data['no_wa'],
                    'jenis_bayar' => $data['jenis_bayar'],
                    'tanggal' => $data['tanggal'],
                    'alamat' => $data['alamat'],
                    'bukti_bayar' => $fileName,
                ]);
            } else {
                // Jika ada file yang diunggah
                $newName = $buktiBayar->getRandomName();
                // jika file ada di database dan file direktori
                if ($fileName && $fileDir) {
                    unlink('assets/img/bukti_bayar/' . $fileName);
                }
                $buktiBayar->move('assets/img/bukti_bayar', $newName);
                $this->trDonatur->update($id, [
                    'nama_perusahaan' => $data['nama_perusahaan'],
                    'jumlah' => $data['jumlah'],
                    'email' => $data['email'],
                    'no_wa' => $data['no_wa'],
                    'jenis_bayar' => $data['jenis_bayar'],
                    'tanggal' => $data['tanggal'],
                    'alamat' => $data['alamat'],
                    'bukti_bayar' => $newName,
                ]);
            }
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/masuk/donatur');
        }
    }

    public function delete($id)
    {
        $fileName = $this->trDonatur->where('id_trDonatur', $id)->select('bukti_bayar')->first()->bukti_bayar;
        unlink('assets/img/bukti_bayar/' . $fileName);
        $this->trDonatur->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
