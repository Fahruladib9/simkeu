<?php

namespace App\Controllers\kepala_pondok\keuangan_keluar;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TKeluar;

class C_k_keluar extends BaseController
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
        return view('kepala_pondok/transaksi_keluar/keluar', $data);
    }

   
}
