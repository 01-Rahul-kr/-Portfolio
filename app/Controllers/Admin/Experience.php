<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ExperienceModel;

class Experience extends BaseController
{
    protected $experienceModel;

    public function __construct()
    {
        $this->experienceModel = new ExperienceModel();
    }

    public function index()
    {
        $data = [
            'page_title'   => 'Manage Experience',
            'active_menu'  => 'experience',
            'experiences' => $this->experienceModel->getOrderedExperience(),
        ];
        return view('admin/experience/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add Experience Record',
            'active_menu' => 'experience',
        ];
        return view('admin/experience/create', $data);
    }

    public function store()
    {
        $rules = [
            'job_title'        => 'required|min_length[3]|max_length[150]',
            'company'          => 'required|min_length[2]|max_length[150]',
            'start_date'       => 'required',
            'responsibilities' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->experienceModel->insert([
            'job_title'        => $this->request->getPost('job_title'),
            'company'          => $this->request->getPost('company'),
            'location'         => $this->request->getPost('location') ?: 'India',
            'start_date'       => $this->request->getPost('start_date'),
            'end_date'         => $this->request->getPost('end_date') ?: 'Present',
            'is_current'       => $this->request->getPost('is_current') ? 1 : 0,
            'responsibilities' => $this->request->getPost('responsibilities'),
            'sort_order'       => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/experience'))->with('success', 'Experience record created successfully!');
    }

    public function edit($id)
    {
        $experience = $this->experienceModel->find($id);
        if (!$experience) {
            return redirect()->to(base_url('admin/experience'))->with('error', 'Experience record not found.');
        }

        $data = [
            'page_title'  => 'Edit Experience Record',
            'active_menu' => 'experience',
            'experience'  => $experience,
        ];
        return view('admin/experience/edit', $data);
    }

    public function update($id)
    {
        $experience = $this->experienceModel->find($id);
        if (!$experience) {
            return redirect()->to(base_url('admin/experience'))->with('error', 'Experience record not found.');
        }

        $rules = [
            'job_title'        => 'required|min_length[3]|max_length[150]',
            'company'          => 'required|min_length[2]|max_length[150]',
            'start_date'       => 'required',
            'responsibilities' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->experienceModel->update($id, [
            'job_title'        => $this->request->getPost('job_title'),
            'company'          => $this->request->getPost('company'),
            'location'         => $this->request->getPost('location') ?: 'India',
            'start_date'       => $this->request->getPost('start_date'),
            'end_date'         => $this->request->getPost('end_date') ?: 'Present',
            'is_current'       => $this->request->getPost('is_current') ? 1 : 0,
            'responsibilities' => $this->request->getPost('responsibilities'),
            'sort_order'       => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/experience'))->with('success', 'Experience record updated successfully!');
    }

    public function delete($id)
    {
        $experience = $this->experienceModel->find($id);
        if ($experience) {
            $this->experienceModel->delete($id);
            return redirect()->to(base_url('admin/experience'))->with('success', 'Experience record deleted successfully.');
        }
        return redirect()->to(base_url('admin/experience'))->with('error', 'Experience record not found.');
    }
}
