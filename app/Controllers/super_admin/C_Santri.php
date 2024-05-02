<?php

namespace App\Controllers\super_admin;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Santri;

class C_Santri extends BaseController
{

    public function __construct()
    {
        $this->santri = new M_Santri();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['santri'] = $this->santri->orderBy('id_santri', 'DESC')->findAll();
        $data['kelas'] = $this->db->table('kelas')->get()->getResult();
        $date = date('Y-m-d');
        // Looping data untuk mendapatkan tgl_jatuh_tempo tiap user
        foreach ($data['santri'] as $key => $value) {
            $tglTempo[] = $value->tgl_jatuh_tempo;
            // jika $date(tanggal sekarang) melewati tanggal batas tempo status berubah menjadi non aktif, jika tidak melewati maka status aktif
            $status[] = ($date > $tglTempo[$key]) ? 'non aktif' : 'aktif';
        }
        $data['status'] = $status;
        // dd($data);
        return view('admin_keuangan/santri/santri', $data);
    }

    public function tambah()
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'nis' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'NIS tidak boleh kosong.',
                    'integer' => 'NIS hanya berisi angka.',
                ],
            ],
            'nama_santri' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama santri tidak boleh kosong.',
                ],
            ],
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelas lahir tidak boleh kosong.',
                ],
            ],
            'jenis_kelamin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong.',
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                ],
            ],
            'no_hp' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'No Hp tidak boleh kosong.',
                    'integer' => 'No Hp hanya berisi angka.',
                ],
            ],
            'nama_wali' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama wali tidak boleh kosong.',
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
            $this->santri->insert([
                'nis' => $data['nis'],
                'nama_santri' => $data['nama_santri'],
                'kelas' => $data['kelas'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
                'nama_wali' => $data['nama_wali'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'status' => 'non aktif'
            ]);
            $this->setting->allert('Sukses', 'Data berhasil ditambahkan', 'success');
            return redirect()->back();
        }
    }

    public function edit($id = null)
    {
        $data['santri'] = $this->santri->find($id);
        $data['kelas'] = $this->db->table('kelas')->get()->getResult();
        // dd($data);
        return view('admin_keuangan/santri/edit', $data);
    }

    public function update($id = null)
    {
        $data = esc($this->request->getPost());

        if (!$this->validate([
            'nis' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'NIS tidak boleh kosong.',
                    'integer' => 'NIS hanya berisi angka.',
                ],
            ],
            'nama_santri' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama santri tidak boleh kosong.',
                ],
            ],
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kelas lahir tidak boleh kosong.',
                ],
            ],
            'jenis_kelamin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin tidak boleh kosong.',
                ],
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                ],
            ],
            'no_hp' => [
                'rules'  => 'required|integer',
                'errors' => [
                    'required' => 'No Hp tidak boleh kosong.',
                    'integer' => 'No Hp hanya berisi angka.',
                ],
            ],
            'nama_wali' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama wali tidak boleh kosong.',
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
            $this->santri->update($id, [
                'nis' => $data['nis'],
                'nama_santri' => $data['nama_santri'],
                'kelas' => $data['kelas'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'alamat' => $data['alamat'],
                'no_hp' => $data['no_hp'],
                'nama_wali' => $data['nama_wali'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'status' => 'non aktif'
            ]);
            $this->setting->allert('Sukses', 'Data berhasil diupdate', 'success');
            return redirect()->to('/santri');
        }
    }

    public function delete($id)
    {
        $this->santri->delete($id);
        $this->setting->allert('Sukses', 'Data berhasil dihapus', 'success');
        return redirect()->back();
    }
}
