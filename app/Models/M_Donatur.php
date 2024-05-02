<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Donatur extends Model
{
    protected $table      = 'donatur';
    protected $primaryKey = 'id_donatur';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_donatur',
        'donatur',
    ];
}
