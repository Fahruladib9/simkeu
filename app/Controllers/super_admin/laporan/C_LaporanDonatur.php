<?php

namespace App\Controllers\super_admin\laporan;

use App\Controllers\BaseController;
use App\Controllers\Settings;
use App\Models\M_TrDonatur;
use Dompdf\Dompdf;

class C_LaporanDonatur extends BaseController
{

    public function __construct()
    {
        $this->donatur = new M_TrDonatur();
        $this->setting = new Settings();
    }

    public function index()
    {
        return view('admin_keuangan/laporan/donatur/laporan_donatur');
    }

    public function cetak()
    {
        $dompdf = new Dompdf();
        $tanggalAwal = $this->request->getPost('tanggal_awal');
        $tanggalAkhir = $this->request->getPost('tanggal_akhir');
        $data['donatur'] = $this->donatur->where('tanggal <=', $tanggalAkhir)->where('tanggal >=', $tanggalAwal)->findAll();

        $header = file_get_contents('assets/img/header.png');
        $footer = file_get_contents('assets/img/footer.png');

        $data['header'] = base64_encode($header);
        $data['footer'] = base64_encode($footer);
        $data['tanggal_awal'] = $tanggalAwal;
        $data['tanggal_akhir'] = $tanggalAkhir;

        // return view('admin_keuangan/laporan/donatur/_cetakDonatur', $data);
        $dompdf->loadHtml(view('admin_keuangan/laporan/donatur/_cetakDonatur', $data));
        $filename = date('y-m-d-H-i-s') . ' - laporan donatur';

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // buat nomor halaman otomatis
        $canvas = $dompdf->get_canvas();
        $font = "arial";
        $canvas->page_text(15, 1, "Halaman: {PAGE_NUM} dari {PAGE_COUNT}", $font, 7, array(0, 0, 0));

        // Output the generated PDF to Browser
        $dompdf->stream($filename);
    }
}
