<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        // 1. Users Table
        $this->db->table('users')->truncate();
        $this->db->table('users')->insert([
            'id'         => 1,
            'username'   => 'admin',
            'email'      => 'satyamraj@example.com',
            'password'   => '$2y$10$cgbaqUS4YMG0NbyZVuwYQ.XE4KzScicPDRxWOB6j1Eqc5u7fxrWmm',
            'full_name'  => 'Satyam Raj',
            'avatar'     => 'assets/images/hero_satyam.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // 2. Settings Table
        $this->db->table('settings')->truncate();
        $this->db->table('settings')->insert([
            'id'                => 1,
            'site_title'        => 'Satyam Raj | PHP Developer Portfolio',
            'meta_description'  => 'Portfolio of Satyam Raj, a passionate Software Engineer and PHP Developer specializing in CodeIgniter 4, MySQL, REST APIs, Bootstrap 5, and modern web application development.',
            'meta_keywords'     => 'Satyam Raj, PHP Developer, CodeIgniter 4 Developer, Web Application Developer, Software Engineer, Portfolio, CodeIgniter',
            'owner_name'        => 'Satyam Raj',
            'profession'        => 'PHP Developer',
            'current_company'   => 'Suropriyo Enterprises Private Limited',
            'years_experience'  => 3,
            'bio'               => 'Passionate Software Developer with extensive experience in building scalable web applications using CodeIgniter, PHP 8+, MySQL, JavaScript, and Bootstrap 5.',
            'career_objective'  => 'Passionate Software Developer with experience in PHP development and modern web technologies. Skilled in developing scalable web applications using CodeIgniter, PHP, MySQL, JavaScript, Bootstrap, and REST APIs. Looking to build innovative digital solutions with clean architecture and excellent user experience.',
            'phone'             => '+91 98765 43210',
            'email'             => 'satyamraj.dev@example.com',
            'location'          => 'Kolkata / Bihar, India',
            'google_map_iframe' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.123456789!2d88.3639!3d22.5726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277a1a2b3c4d5%3A0x123456789abcdef!2sKolkata!5e0!3m2!1sen!2sin!4v1600000000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'hero_image'        => 'assets/images/hero_satyam.jpg',
            'about_image'       => 'assets/images/about_satyam.jpg',
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);

        // 3. Skills Table
        $this->db->table('skills')->truncate();
        $this->db->table('skills')->insertBatch([
            ['name' => 'PHP', 'category' => 'Backend', 'percentage' => 92, 'icon' => 'fab fa-php', 'sort_order' => 1],
            ['name' => 'CodeIgniter 4', 'category' => 'Backend', 'percentage' => 95, 'icon' => 'fas fa-fire', 'sort_order' => 2],
            ['name' => 'MySQL', 'category' => 'Database', 'percentage' => 88, 'icon' => 'fas fa-database', 'sort_order' => 3],
            ['name' => 'JavaScript', 'category' => 'Frontend', 'percentage' => 85, 'icon' => 'fab fa-js', 'sort_order' => 4],
            ['name' => 'HTML5', 'category' => 'Frontend', 'percentage' => 95, 'icon' => 'fab fa-html5', 'sort_order' => 5],
            ['name' => 'CSS3', 'category' => 'Frontend', 'percentage' => 90, 'icon' => 'fab fa-css3-alt', 'sort_order' => 6],
            ['name' => 'Bootstrap 5', 'category' => 'Frontend', 'percentage' => 92, 'icon' => 'fab fa-bootstrap', 'sort_order' => 7],
            ['name' => 'jQuery', 'category' => 'Frontend', 'percentage' => 88, 'icon' => 'fas fa-code-branch', 'sort_order' => 8],
            ['name' => 'AJAX', 'category' => 'Frontend', 'percentage' => 90, 'icon' => 'fas fa-sync-alt', 'sort_order' => 9],
            ['name' => 'REST API', 'category' => 'Backend', 'percentage' => 88, 'icon' => 'fas fa-plug', 'sort_order' => 10],
            ['name' => 'Git', 'category' => 'Tools', 'percentage' => 85, 'icon' => 'fab fa-git-alt', 'sort_order' => 11],
            ['name' => 'GitHub', 'category' => 'Tools', 'percentage' => 88, 'icon' => 'fab fa-github', 'sort_order' => 12],
            ['name' => 'Responsive Design', 'category' => 'Frontend', 'percentage' => 95, 'icon' => 'fas fa-mobile-alt', 'sort_order' => 13],
        ]);

        // 4. Experience Table
        $this->db->table('experience')->truncate();
        $this->db->table('experience')->insert([
            'job_title'        => 'PHP Developer',
            'company'          => 'Suropriyo Enterprises Private Limited',
            'location'         => 'West Bengal, India',
            'start_date'       => '2023 - Present',
            'end_date'         => 'Present',
            'is_current'       => 1,
            'responsibilities' => 'Developing Web Applications|Bug Fixing & Performance Optimization|Database Design & Indexing|RESTful API Integration|Code Optimization & Security Implementation|MVC Architecture Development using CodeIgniter 4',
            'sort_order'       => 1,
        ]);

        // 5. Education Table
        $this->db->table('education')->truncate();
        $this->db->table('education')->insertBatch([
            [
                'degree'         => 'Bachelor of Technology (B.Tech)',
                'field_of_study' => 'Computer Science Engineering',
                'institution'    => 'Technical University',
                'passing_year'   => '2020 - 2023',
                'grade_score'    => 'First Class with Distinction',
                'description'    => 'Focused on Software Engineering, Database Systems, Web Technologies, Object-Oriented Programming, and Data Structures.',
                'sort_order'     => 1,
            ],
            [
                'degree'         => 'Diploma',
                'field_of_study' => 'Petrochemical Engineering',
                'institution'    => 'State Board of Technical Education',
                'passing_year'   => '2017 - 2020',
                'grade_score'    => 'First Class',
                'description'    => 'Studied core engineering fundamentals, analytical problem solving, chemical process dynamics, and industrial systems.',
                'sort_order'     => 2,
            ],
        ]);

        // 6. Projects Table
        $this->db->table('projects')->truncate();
        $this->db->table('projects')->insertBatch([
            [
                'title'        => 'Enterprise E-Commerce Portal',
                'slug'         => 'enterprise-ecommerce-portal',
                'category'     => 'CI4',
                'description'  => 'A full-featured E-Commerce web application built with CodeIgniter 4, MySQL, Bootstrap 5, AJAX cart, payment gateway integration, and role-based admin dashboard.',
                'image'        => 'assets/images/project1.jpg',
                'technologies' => 'PHP 8, CodeIgniter 4, MySQL, Bootstrap 5, AJAX, Payment Gateway',
                'github_link'  => 'https://github.com',
                'demo_link'    => 'https://demo.com',
                'is_featured'  => 1,
                'sort_order'   => 1,
            ],
            [
                'title'        => 'Corporate ERP & Inventory System',
                'slug'         => 'corporate-erp-inventory-system',
                'category'     => 'PHP',
                'description'  => 'Scalable Enterprise Resource Planning (ERP) application with inventory management, invoice generation, user authorization filters, and real-time report generation.',
                'image'        => 'assets/images/project2.jpg',
                'technologies' => 'PHP, MySQL, CodeIgniter 4, jQuery, DataTables, Bootstrap 5',
                'github_link'  => 'https://github.com',
                'demo_link'    => 'https://demo.com',
                'is_featured'  => 1,
                'sort_order'   => 2,
            ],
            [
                'title'        => 'RESTful API Services Engine',
                'slug'         => 'restful-api-services-engine',
                'category'     => 'CI4',
                'description'  => 'Secure REST API engine with JWT authentication, rate limiting, JSON response formatting, and interactive Swagger-style API documentation.',
                'image'        => 'assets/images/project1.jpg',
                'technologies' => 'CodeIgniter 4, PHP 8, REST API, JWT, MySQL',
                'github_link'  => 'https://github.com',
                'demo_link'    => 'https://demo.com',
                'is_featured'  => 1,
                'sort_order'   => 3,
            ],
            [
                'title'        => 'Dynamic Portfolio & Content CMS',
                'slug'         => 'dynamic-portfolio-content-cms',
                'category'     => 'Bootstrap',
                'description'  => 'Modern developer portfolio with dynamic admin panel, customizable theme settings, inquiry management, and optimized SEO metadata tags.',
                'image'        => 'assets/images/project2.jpg',
                'technologies' => 'CodeIgniter 4, Bootstrap 5, JavaScript, AOS, MySQL',
                'github_link'  => 'https://github.com',
                'demo_link'    => 'https://demo.com',
                'is_featured'  => 1,
                'sort_order'   => 4,
            ],
        ]);

        // 7. Services Table
        $this->db->table('services')->truncate();
        $this->db->table('services')->insertBatch([
            ['title' => 'Web Development', 'icon' => 'fas fa-laptop-code', 'description' => 'Designing and developing modern, responsive, and cross-browser compatible web applications tailored to user needs.', 'sort_order' => 1],
            ['title' => 'Backend Development', 'icon' => 'fas fa-server', 'description' => 'Building robust backend logic, business workflows, and secure server-side solutions with PHP 8 and clean architecture.', 'sort_order' => 2],
            ['title' => 'PHP Development', 'icon' => 'fab fa-php', 'description' => 'Expert custom PHP development creating high-performance, object-oriented, and maintainable software systems.', 'sort_order' => 3],
            ['title' => 'CodeIgniter Development', 'icon' => 'fas fa-fire', 'description' => 'Building lightweight, ultra-fast MVC web applications using CodeIgniter 4 framework with scalable database architecture.', 'sort_order' => 4],
            ['title' => 'Database Design', 'icon' => 'fas fa-database', 'description' => 'Designing efficient MySQL relational database schemas, query optimization, indexing, and data security.', 'sort_order' => 5],
            ['title' => 'API Integration', 'icon' => 'fas fa-plug', 'description' => 'Developing and integrating RESTful APIs, third-party payment gateways, authentication systems, and web services.', 'sort_order' => 6],
        ]);

        // 8. Resume Table
        $this->db->table('resume')->truncate();
        $this->db->table('resume')->insert([
            'id'        => 1,
            'file_path' => 'assets/uploads/resume/Satyam_Raj_Resume.pdf',
            'file_name' => 'Satyam_Raj_Resume.pdf',
            'file_size' => '120 KB',
        ]);

        // 9. Social Links Table
        $this->db->table('social_links')->truncate();
        $this->db->table('social_links')->insertBatch([
            ['platform' => 'LinkedIn', 'url' => 'https://linkedin.com/in/satyam-raj', 'icon' => 'fab fa-linkedin-in', 'is_active' => 1, 'sort_order' => 1],
            ['platform' => 'GitHub', 'url' => 'https://github.com/satyamraj', 'icon' => 'fab fa-github', 'is_active' => 1, 'sort_order' => 2],
            ['platform' => 'Instagram', 'url' => 'https://instagram.com/satyamraj', 'icon' => 'fab fa-instagram', 'is_active' => 1, 'sort_order' => 3],
            ['platform' => 'Email', 'url' => 'mailto:satyamraj.dev@example.com', 'icon' => 'fas fa-envelope', 'is_active' => 1, 'sort_order' => 4],
        ]);

        // 10. Messages Table
        $this->db->table('messages')->truncate();
        $this->db->table('messages')->insert([
            'name'       => 'John Doe',
            'email'      => 'john.doe@example.com',
            'phone'      => '+1 555-0199',
            'subject'    => 'Project Inquiry for CI4 Web App',
            'message'    => 'Hi Satyam, I saw your portfolio and impressive CodeIgniter 4 skills. We have a web project requirement and would like to discuss.',
            'is_read'    => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
