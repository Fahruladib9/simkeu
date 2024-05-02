<?php

namespace App\Controllers\kepala_pondok;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_Donatur;

class C_k_donatur extends BaseController
{

    public function __construct()
    {
        $this->donatur = new M_Donatur();
        $this->setting = new Settings();
    }

    public function index()
    {
        $data['donatur'] = $this->donatur->orderBy('id_donatur', 'DESC')->findAll();
        return view('kepala_pondok/donatur/donatur', $data);
    }


}
