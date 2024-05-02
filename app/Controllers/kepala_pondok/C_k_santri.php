<?php

namespace App\Controllers\kepala_pondok;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Santri;

class C_k_santri extends BaseController
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
        return view('kepala_pondok/santri/santri', $data);
    }
}
