<?php

namespace App\Models;

use CodeIgniter\Model;

class ExperienceModel extends Model
{
    protected $table            = 'experience';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['job_title', 'company', 'location', 'start_date', 'end_date', 'is_current', 'responsibilities', 'sort_order'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getOrderedExperience()
    {
        return $this->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC')->findAll();
    }
}
