<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Users extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';

    protected $allowedFields = [
        'id_user',
        'nama',
        'password',
        'username',
        'role',
        'tanggal_lahir',
    ];
}
