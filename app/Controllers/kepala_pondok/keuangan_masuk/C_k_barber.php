<?php

namespace App\Controllers\kepala_pondok\keuangan_masuk;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrBarber;

class C_k_barber extends BaseController
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
        return view('kepala_pondok/barber_masuk/barber', $data);
    }

}
