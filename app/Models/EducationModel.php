<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table            = 'education';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['degree', 'field_of_study', 'institution', 'passing_year', 'grade_score', 'description', 'sort_order'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getOrderedEducation()
    {
        return $this->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC')->findAll();
    }
}
