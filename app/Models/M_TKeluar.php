<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TKeluar extends Model
{
    protected $table      = 't_keluar';
    protected $primaryKey = 'id_tKeluar';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_tKeluar',
        'keterangan',
        'jumlah',
        'tanggal',
    ];
}
