<?php

namespace App\Controllers\kepala_pondok\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrDonatur;

class C_k_donatur extends BaseController
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
        return view('kepala_pondok/donatur_masuk/donatur', $data);
    }
}
