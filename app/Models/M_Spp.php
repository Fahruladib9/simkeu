<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Spp extends Model
{
    protected $table      = 'spp';
    protected $primaryKey = 'id_spp';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_spp',
        'nis',
        'nama',
        'kelas',
        'keterangan',
        'jumlah',
        'tanggal',
        'tgl_jatuh_tempo',
    ];
}
