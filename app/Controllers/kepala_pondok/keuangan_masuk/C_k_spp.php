<?php

namespace App\Controllers\kepala_pondok\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Santri;
use App\Models\M_Spp;
use App\Models\M_Users;

class C_k_spp extends BaseController
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
        return view('kepala_pondok/spp/spp', $data);
    }

}
