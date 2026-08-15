-- CodeIgniter 4 Portfolio Database Schema for Rahul Kumar
-- Database: `portfolio`

CREATE DATABASE IF NOT EXISTS `portfolio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `portfolio`;

-- --------------------------------------------------------
-- Table structure for `users`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `full_name` VARCHAR(150) NOT NULL,
  `avatar` VARCHAR(255) DEFAULT 'assets/images/hero_rahul.jpg',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `avatar`) VALUES
(1, 'admin', 'rahulkumar@example.com', '$2y$10$cgbaqUS4YMG0NbyZVuwYQ.XE4KzScicPDRxWOB6j1Eqc5u7fxrWmm', 'Rahul Kumar', 'assets/images/hero_rahul.jpg');

-- --------------------------------------------------------
-- Table structure for `settings`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `site_title` VARCHAR(255) NOT NULL DEFAULT 'Rahul Kumar | Senior PHP & CodeIgniter Developer Portfolio',
  `meta_description` TEXT,
  `meta_keywords` TEXT,
  `owner_name` VARCHAR(100) NOT NULL DEFAULT 'Rahul Kumar',
  `profession` VARCHAR(150) NOT NULL DEFAULT 'PHP Developer',
  `current_company` VARCHAR(200) DEFAULT 'Suropriyo Enterprises Private Limited',
  `years_experience` INT DEFAULT 3,
  `bio` TEXT,
  `career_objective` TEXT,
  `phone` VARCHAR(50) DEFAULT '+91 98765 43210',
  `email` VARCHAR(100) DEFAULT 'rahulkumar.dev@example.com',
  `location` VARCHAR(150) DEFAULT 'India',
  `google_map_iframe` TEXT,
  `hero_image` VARCHAR(255) DEFAULT 'assets/images/hero_rahul.jpg',
  `about_image` VARCHAR(255) DEFAULT 'assets/images/about_rahul.jpg',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`id`, `site_title`, `meta_description`, `meta_keywords`, `owner_name`, `profession`, `current_company`, `years_experience`, `bio`, `career_objective`, `phone`, `email`, `location`, `google_map_iframe`, `hero_image`, `about_image`) VALUES
(1, 
'Rahul Kumar | PHP Developer Portfolio', 
'Portfolio of Rahul Kumar, a passionate Software Engineer and PHP Developer specializing in CodeIgniter 4, MySQL, REST APIs, Bootstrap 5, and modern web application development.', 
'Rahul Kumar, PHP Developer, CodeIgniter 4 Developer, Web Application Developer, Software Engineer, Portfolio, CodeIgniter', 
'Rahul Kumar', 
'PHP Developer', 
'Suropriyo Enterprises Private Limited', 
3, 
'Passionate Software Developer with extensive experience in building scalable web applications using CodeIgniter, PHP 8+, MySQL, JavaScript, and Bootstrap 5.', 
'Passionate Software Developer with experience in PHP development and modern web technologies. Skilled in developing scalable web applications using CodeIgniter, PHP, MySQL, JavaScript, Bootstrap, and REST APIs. Looking to build innovative digital solutions with clean architecture and excellent user experience.', 
'+91 98765 43210', 
'rahulkumar.dev@example.com', 
'Kolkata / Bihar, India', 
'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.123456789!2d88.3639!3d22.5726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277a1a2b3c4d5%3A0x123456789abcdef!2sKolkata!5e0!3m2!1sen!2sin!4v1600000000000!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>', 
'assets/images/hero_rahul.jpg', 
'assets/images/about_rahul.jpg');

-- --------------------------------------------------------
-- Table structure for `skills`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `skills`;
CREATE TABLE `skills` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `category` VARCHAR(50) DEFAULT 'Programming',
  `percentage` INT NOT NULL DEFAULT 85,
  `icon` VARCHAR(100) DEFAULT 'fa-code',
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `skills` (`name`, `category`, `percentage`, `icon`, `sort_order`) VALUES
('PHP', 'Backend', 92, 'fab fa-php', 1),
('CodeIgniter 4', 'Backend', 95, 'fas fa-fire', 2),
('MySQL', 'Database', 88, 'fas fa-database', 3),
('JavaScript', 'Frontend', 85, 'fab fa-js', 4),
('HTML5', 'Frontend', 95, 'fab fa-html5', 5),
('CSS3', 'Frontend', 90, 'fab fa-css3-alt', 6),
('Bootstrap 5', 'Frontend', 92, 'fab fa-bootstrap', 7),
('jQuery', 'Frontend', 88, 'fas fa-code-branch', 8),
('AJAX', 'Frontend', 90, 'fas fa-sync-alt', 9),
('REST API', 'Backend', 88, 'fas fa-plug', 10),
('Git', 'Tools', 85, 'fab fa-git-alt', 11),
('GitHub', 'Tools', 88, 'fab fa-github', 12),
('Responsive Design', 'Frontend', 95, 'fas fa-mobile-alt', 13);

-- --------------------------------------------------------
-- Table structure for `experience`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `experience`;
CREATE TABLE `experience` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `job_title` VARCHAR(150) NOT NULL,
  `company` VARCHAR(150) NOT NULL,
  `location` VARCHAR(150) DEFAULT 'India',
  `start_date` VARCHAR(50) NOT NULL,
  `end_date` VARCHAR(50) DEFAULT 'Present',
  `is_current` TINYINT(1) DEFAULT 1,
  `responsibilities` TEXT NOT NULL,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `experience` (`job_title`, `company`, `location`, `start_date`, `end_date`, `is_current`, `responsibilities`, `sort_order`) VALUES
('PHP Developer', 'Suropriyo Enterprises Private Limited', 'West Bengal, India', '2023 - Present', 'Present', 1, 
'Developing Web Applications|Bug Fixing & Performance Optimization|Database Design & Indexing|RESTful API Integration|Code Optimization & Security Implementation|MVC Architecture Development using CodeIgniter 4', 1);

-- --------------------------------------------------------
-- Table structure for `education`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `degree` VARCHAR(150) NOT NULL,
  `field_of_study` VARCHAR(150) NOT NULL,
  `institution` VARCHAR(200) NOT NULL,
  `passing_year` VARCHAR(50) NOT NULL,
  `grade_score` VARCHAR(50) DEFAULT NULL,
  `description` TEXT,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `education` (`degree`, `field_of_study`, `institution`, `passing_year`, `grade_score`, `description`, `sort_order`) VALUES
('Bachelor of Technology (B.Tech)', 'Computer Science Engineering', 'Technical University', '2020 - 2023', 'First Class with Distinction', 'Focused on Software Engineering, Database Systems, Web Technologies, Object-Oriented Programming, and Data Structures.', 1),
('Diploma', 'Petrochemical Engineering', 'State Board of Technical Education', '2017 - 2020', 'First Class', 'Studied core engineering fundamentals, analytical problem solving, chemical process dynamics, and industrial systems.', 2);

-- --------------------------------------------------------
-- Table structure for `projects`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(200) NOT NULL,
  `slug` VARCHAR(200) NOT NULL UNIQUE,
  `category` VARCHAR(50) NOT NULL DEFAULT 'PHP',
  `description` TEXT NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `technologies` VARCHAR(255) NOT NULL,
  `github_link` VARCHAR(255) DEFAULT '#',
  `demo_link` VARCHAR(255) DEFAULT '#',
  `is_featured` TINYINT(1) DEFAULT 1,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `projects` (`title`, `slug`, `category`, `description`, `image`, `technologies`, `github_link`, `demo_link`, `is_featured`, `sort_order`) VALUES
('Enterprise E-Commerce Portal', 'enterprise-ecommerce-portal', 'CI4', 'A full-featured E-Commerce web application built with CodeIgniter 4, MySQL, Bootstrap 5, AJAX cart, payment gateway integration, and role-based admin dashboard.', 'assets/images/project1.jpg', 'PHP 8, CodeIgniter 4, MySQL, Bootstrap 5, AJAX, Payment Gateway', 'https://github.com', 'https://demo.com', 1, 1),
('Corporate ERP & Inventory System', 'corporate-erp-inventory-system', 'PHP', 'Scalable Enterprise Resource Planning (ERP) application with inventory management, invoice generation, user authorization filters, and real-time report generation.', 'assets/images/project2.jpg', 'PHP, MySQL, CodeIgniter 4, jQuery, DataTables, Bootstrap 5', 'https://github.com', 'https://demo.com', 1, 2),
('RESTful API Services Engine', 'restful-api-services-engine', 'CI4', 'Secure REST API engine with JWT authentication, rate limiting, JSON response formatting, and interactive Swagger-style API documentation.', 'assets/images/project1.jpg', 'CodeIgniter 4, PHP 8, REST API, JWT, MySQL', 'https://github.com', 'https://demo.com', 1, 3),
('Dynamic Portfolio & Content CMS', 'dynamic-portfolio-content-cms', 'Bootstrap', 'Modern developer portfolio with dynamic admin panel, customizable theme settings, inquiry management, and optimized SEO metadata tags.', 'assets/images/project2.jpg', 'CodeIgniter 4, Bootstrap 5, JavaScript, AOS, MySQL', 'https://github.com', 'https://demo.com', 1, 4);

-- --------------------------------------------------------
-- Table structure for `services`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(150) NOT NULL,
  `icon` VARCHAR(100) NOT NULL DEFAULT 'fas fa-laptop-code',
  `description` TEXT NOT NULL,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `services` (`title`, `icon`, `description`, `sort_order`) VALUES
('Web Development', 'fas fa-laptop-code', 'Designing and developing modern, responsive, and cross-browser compatible web applications tailored to user needs.', 1),
('Backend Development', 'fas fa-server', 'Building robust backend logic, business workflows, and secure server-side solutions with PHP 8 and clean architecture.', 2),
('PHP Development', 'fab fa-php', 'Expert custom PHP development creating high-performance, object-oriented, and maintainable software systems.', 3),
('CodeIgniter Development', 'fas fa-fire', 'Building lightweight, ultra-fast MVC web applications using CodeIgniter 4 framework with scalable database architecture.', 4),
('Database Design', 'fas fa-database', 'Designing efficient MySQL relational database schemas, query optimization, indexing, and data security.', 5),
('API Integration', 'fas fa-plug', 'Developing and integrating RESTful APIs, third-party payment gateways, authentication systems, and web services.', 6);

-- --------------------------------------------------------
-- Table structure for `resume`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `file_path` VARCHAR(255) NOT NULL DEFAULT 'assets/uploads/resume/Rahul_Kumar_Resume.pdf',
  `file_name` VARCHAR(150) NOT NULL DEFAULT 'Rahul_Kumar_Resume.pdf',
  `file_size` VARCHAR(50) DEFAULT '120 KB',
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `resume` (`id`, `file_path`, `file_name`, `file_size`) VALUES
(1, 'assets/uploads/resume/Rahul_Kumar_Resume.pdf', 'Rahul_Kumar_Resume.pdf', '120 KB');

-- --------------------------------------------------------
-- Table structure for `social_links`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `social_links`;
CREATE TABLE `social_links` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `platform` VARCHAR(50) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `icon` VARCHAR(100) NOT NULL,
  `is_active` TINYINT(1) DEFAULT 1,
  `sort_order` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `social_links` (`platform`, `url`, `icon`, `is_active`, `sort_order`) VALUES
('LinkedIn', 'https://linkedin.com/in/rahul-kumar', 'fab fa-linkedin-in', 1, 1),
('GitHub', 'https://github.com/rahulkumar', 'fab fa-github', 1, 2),
('Instagram', 'https://instagram.com/rahulkumar', 'fab fa-instagram', 1, 3),
('Email', 'mailto:rahulkumar.dev@example.com', 'fas fa-envelope', 1, 4);

-- --------------------------------------------------------
-- Table structure for `messages`
-- --------------------------------------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(50) DEFAULT NULL,
  `subject` VARCHAR(200) NOT NULL,
  `message` TEXT NOT NULL,
  `is_read` TINYINT(1) DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `messages` (`name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`) VALUES
('John Doe', 'john.doe@example.com', '+1 555-0199', 'Project Inquiry for CI4 Web App', 'Hi Rahul, I saw your portfolio and impressive CodeIgniter 4 skills. We have a web project requirement and would like to discuss.', 0, NOW());
