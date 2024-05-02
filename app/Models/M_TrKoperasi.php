<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TrKoperasi extends Model
{
    protected $table      = 'tr_koperasi';
    protected $primaryKey = 'id_trKoperasi';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_trKoperasi',
        'jumlah',
        'tanggal',
    ];
}
