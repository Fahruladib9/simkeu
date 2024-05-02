<?php

namespace App\Controllers\super_admin;

use App\Controllers\BaseController;
use App\Models\M_Spp;
use App\Models\M_TKeluar;
use App\Models\M_TrBarber;
use App\Models\M_TrDonatur;
use App\Models\M_TrKoperasi;

class Home extends BaseController
{
    public function __construct()
    {
        $this->spp = new M_Spp();
        $this->donatur = new M_TrDonatur();
        $this->koperasi = new M_TrKoperasi();
        $this->barber = new M_TrBarber();
        $this->pengeluaran = new M_TKeluar();
    }

    public function index()
    {
        $date = date('Y-m-d');
        $dateThisYear = date('Y-01-01');
        $dateThisMonth = date('Y-m-01');

        // filter spp tahun ini
        $data['spp_tahun_ini'] = $this->spp->where('tanggal <=', $date)->where('tanggal>=', $dateThisYear)->selectSum('jumlah')->first()->jumlah;

        // filter data bulan ini
        $sppBulanIni = $this->spp->where('tanggal <=', $date)->where('tanggal>=', $dateThisMonth)->selectSum('jumlah')->first()->jumlah;
        $data['barber_bulan_ini'] = $this->barber->where('tanggal <=', $date)->where('tanggal >=', $dateThisMonth)->selectSum('jumlah')->first()->jumlah;
        $data['donatur_bulan_ini'] = $this->donatur->where('tanggal <=', $date)->where('tanggal >=', $dateThisMonth)->selectSum('jumlah')->first()->jumlah;
        $data['koperasi_bulan_ini'] = $this->koperasi->where('tanggal <=', $date)->where('tanggal >=', $dateThisMonth)->selectSum('jumlah')->first()->jumlah;
        $data['pemasukan_bulan_ini'] = $sppBulanIni + $data['barber_bulan_ini'] + $data['donatur_bulan_ini'] + $data['koperasi_bulan_ini'];
        $data['pengeluaran_bulan_ini'] = $this->pengeluaran->where('tanggal <=', $date)->where('tanggal >=', $dateThisMonth)->selectSum('jumlah')->first()->jumlah;

        // get total jumlah
        $spp = $this->spp->selectSum('jumlah')->first()->jumlah;
        $donatur = $this->donatur->selectSum('jumlah')->first()->jumlah;
        $koperasi = $this->koperasi->selectSum('jumlah')->first()->jumlah;
        $barber = $this->barber->selectSum('jumlah')->first()->jumlah;
        $pengeluaran = $this->pengeluaran->selectSum('jumlah')->first()->jumlah;

        // total saldo
        $data['saldo_kas'] = ($spp + $donatur + $koperasi + $barber) - $pengeluaran;

        return view('admin_keuangan/dashboard', $data);
    }
}
