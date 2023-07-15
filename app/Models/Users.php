<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table         = 'users';
    protected $allowedFields = [
         'uname','email', 'role','pass'
    ];
    protected $primaryKey = 'email';
    protected $returnType  =  'array';
}