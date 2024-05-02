<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kelas extends Model
{
    protected $table      = 'kelas';
    protected $primaryKey = 'id_kelas';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_kelas',
        'kelas',
    ];
}
