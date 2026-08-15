<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\SkillModel;
use App\Models\MessageModel;
use App\Models\ServiceModel;
use App\Models\ExperienceModel;
use App\Models\EducationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $projectModel    = new ProjectModel();
        $skillModel       = new SkillModel();
        $messageModel     = new MessageModel();
        $serviceModel     = new ServiceModel();
        $experienceModel  = new ExperienceModel();
        $educationModel   = new EducationModel();

        $data = [
            'page_title'       => 'Admin Dashboard',
            'active_menu'      => 'dashboard',
            'total_projects'   => $projectModel->countAllResults(),
            'total_skills'     => $skillModel->countAllResults(),
            'total_messages'   => $messageModel->countAllResults(),
            'unread_messages' => $messageModel->getUnreadCount(),
            'total_services'   => $serviceModel->countAllResults(),
            'total_experience' => $experienceModel->countAllResults(),
            'total_education'  => $educationModel->countAllResults(),
            'recent_messages'  => $messageModel->orderBy('id', 'DESC')->findAll(5),
        ];

        return view('admin/dashboard', $data);
    }
}
