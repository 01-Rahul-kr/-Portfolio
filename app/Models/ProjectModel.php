<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table            = 'projects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'title', 'slug', 'category', 'description', 'image',
        'technologies', 'github_link', 'demo_link', 'is_featured', 'sort_order'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getOrderedProjects()
    {
        return $this->orderBy('sort_order', 'ASC')->orderBy('id', 'DESC')->findAll();
    }

    public function getCategories()
    {
        $categories = $this->distinct()->select('category')->findAll();
        return array_column($categories, 'category');
    }
}
