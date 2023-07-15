<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizListModel extends Model
{
    protected $table         = 'modules';
    protected $allowedFields = ['mname' ];
    protected $primaryKey = 'moduleid';
    protected $returnType  =  'array';
       // Dates
       protected $useTimestamps = false;
       protected $dateFormat    = 'datetime';
       protected $createdField  = 'created_at';
       protected $updatedField  = 'updated_at';
}
