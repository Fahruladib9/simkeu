<?php

namespace App\Models;

use CodeIgniter\Model;

class M_TrBarber extends Model
{
    protected $table      = 'tr_barber';
    protected $primaryKey = 'id_trBarber';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_trBarber',
        'jumlah',
        'tanggal',
    ];
}
