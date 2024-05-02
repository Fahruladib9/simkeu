<?php

namespace App\Controllers\kepala_pondok;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Kelas;

class C_k_kelas extends BaseController
{

    public function __construct()
    {
        $this->kelas = new M_Kelas();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['kelas'] = $this->kelas->orderBy('id_kelas', 'DESC')->findAll();
        return view('kepala_pondok/kelas/kelas', $data);
    }
}
