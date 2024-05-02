<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TrDonatur extends Model
{
    protected $table      = 'tr_donatur';
    protected $primaryKey = 'id_trDonatur';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_trDonatur',
        'nama_perusahaan',
        'email',
        'jumlah',
        'no_wa',
        'jenis_bayar',
        'alamat',
        'bukti_bayar',
        'tanggal',
    ];
}
