<?php

namespace App\Controllers;

use App\Models\SettingsModel;
use App\Models\SkillModel;
use App\Models\ExperienceModel;
use App\Models\EducationModel;
use App\Models\ProjectModel;
use App\Models\ServiceModel;
use App\Models\ResumeModel;
use App\Models\SocialLinkModel;
use App\Models\MessageModel;

class Home extends BaseController
{
    public function index(): string
    {
        $settingsModel    = new SettingsModel();
        $skillModel       = new SkillModel();
        $experienceModel  = new ExperienceModel();
        $educationModel   = new EducationModel();
        $projectModel     = new ProjectModel();
        $serviceModel     = new ServiceModel();
        $resumeModel      = new ResumeModel();
        $socialLinkModel  = new SocialLinkModel();

        $data = [
            'settings'     => $settingsModel->getSettings(),
            'skills'       => $skillModel->getOrderedSkills(),
            'experiences'  => $experienceModel->getOrderedExperience(),
            'educations'   => $educationModel->getOrderedEducation(),
            'projects'     => $projectModel->getOrderedProjects(),
            'categories'   => $projectModel->getCategories(),
            'services'     => $serviceModel->getOrderedServices(),
            'resume'       => $resumeModel->getActiveResume(),
            'social_links' => $socialLinkModel->getActiveLinks(),
        ];

        return view('home/index', $data);
    }

    public function submitContact()
    {
        if (!$this->request->isAJAX() && !$this->request->is('post')) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request method.']);
        }

        $rules = [
            'name'    => 'required|min_length[2]|max_length[100]',
            'email'   => 'required|valid_email|max_length[100]',
            'subject' => 'required|min_length[3]|max_length[200]',
            'message' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $this->validator->getErrors()
            ]);
        }

        $messageModel = new MessageModel();
        $saveData = [
            'name'       => $this->request->getPost('name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'subject'    => $this->request->getPost('subject'),
            'message'    => $this->request->getPost('message'),
            'is_read'    => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($messageModel->insert($saveData)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Thank you for reaching out! Your message has been sent successfully. I will get back to you soon.'
            ]);
        }

        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Failed to send your message. Please try again later.'
        ]);
    }

    public function downloadResume()
    {
        $resumeModel = new ResumeModel();
        $resume = $resumeModel->getActiveResume();

        $filePath = FCPATH . $resume['file_path'];

        if (file_exists($filePath)) {
            return $this->response->download($filePath, null)->setFileName($resume['file_name']);
        }

        return redirect()->to(base_url('#resume'))->with('error', 'Resume file not found.');
    }
}
