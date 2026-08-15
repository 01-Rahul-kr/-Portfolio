<?php

namespace App\Models;

use CodeIgniter\Model;

class ResumeModel extends Model
{
    protected $table            = 'resume';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['file_path', 'file_name', 'file_size'];

    protected $useTimestamps = false;
    protected $updatedField  = 'updated_at';

    public function getActiveResume()
    {
        $resume = $this->first();
        if (!$resume) {
            return [
                'file_path' => 'assets/uploads/resume/Satyam_Raj_Resume.pdf',
                'file_name' => 'Satyam_Raj_Resume.pdf',
                'file_size' => '120 KB'
            ];
        }
        return $resume;
    }
}
