<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'site_title', 'meta_description', 'meta_keywords', 'owner_name',
        'profession', 'current_company', 'years_experience', 'bio',
        'career_objective', 'phone', 'email', 'location', 'google_map_iframe',
        'hero_image', 'about_image'
    ];

    protected $useTimestamps = false;
    protected $updatedField  = 'updated_at';

    public function getSettings()
    {
        $settings = $this->first();
        if (!$settings) {
            return [
                'site_title' => 'Satyam Raj | PHP Developer Portfolio',
                'meta_description' => 'Portfolio of Satyam Raj, PHP Developer & CodeIgniter 4 Specialist.',
                'meta_keywords' => 'Satyam Raj, PHP Developer, CodeIgniter 4',
                'owner_name' => 'Satyam Raj',
                'profession' => 'PHP Developer',
                'current_company' => 'Suropriyo Enterprises Private Limited',
                'years_experience' => 3,
                'bio' => 'Passionate Software Developer with experience in PHP development and modern web technologies.',
                'career_objective' => 'Passionate Software Developer with experience in PHP development and modern web technologies. Skilled in developing scalable web applications using CodeIgniter, PHP, MySQL, JavaScript, Bootstrap, and REST APIs.',
                'phone' => '+91 98765 43210',
                'email' => 'satyamraj.dev@example.com',
                'location' => 'India',
                'google_map_iframe' => '',
                'hero_image' => 'assets/images/hero_satyam.jpg',
                'about_image' => 'assets/images/about_satyam.jpg'
            ];
        }
        return $settings;
    }
}
