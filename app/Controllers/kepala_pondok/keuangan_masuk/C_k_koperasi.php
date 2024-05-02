<?php

namespace App\Controllers\kepala_pondok\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrKoperasi;

class C_k_koperasi extends BaseController
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
        return view('kepala_pondok/koperasi_masuk/koperasi', $data);
    }
}
