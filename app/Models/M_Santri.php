<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Santri extends Model
{
    protected $table      = 'santri';
    protected $primaryKey = 'id_santri';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_santri',
        'nis',
        'nama_santri',
        'kelas',
        'status',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'nama_wali',
        'tanggal_lahir',
        'tgl_jatuh_tempo',
    ];
}
