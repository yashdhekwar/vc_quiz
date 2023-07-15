<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $table         = 'questions';
    protected $allowedFields = ['questions','opt1','opt2','opt3','opt4','ans','moduleid','explanation'];
    protected $primaryKey = 'qid';
    protected $returnType  =  'array';
       // Dates
       protected $useTimestamps = false;
       protected $dateFormat    = 'datetime';
       protected $createdField  = 'created_at';
       protected $updatedField  = 'updated_at';
}
