<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EducationModel;

class Education extends BaseController
{
    protected $educationModel;

    public function __construct()
    {
        $this->educationModel = new EducationModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Manage Education',
            'active_menu' => 'education',
            'educations'  => $this->educationModel->getOrderedEducation(),
        ];
        return view('admin/education/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add Education Record',
            'active_menu' => 'education',
        ];
        return view('admin/education/create', $data);
    }

    public function store()
    {
        $rules = [
            'degree'         => 'required|min_length[2]|max_length[150]',
            'field_of_study' => 'required|min_length[2]|max_length[150]',
            'institution'    => 'required|min_length[2]|max_length[200]',
            'passing_year'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->educationModel->insert([
            'degree'         => $this->request->getPost('degree'),
            'field_of_study' => $this->request->getPost('field_of_study'),
            'institution'    => $this->request->getPost('institution'),
            'passing_year'   => $this->request->getPost('passing_year'),
            'grade_score'    => $this->request->getPost('grade_score'),
            'description'    => $this->request->getPost('description'),
            'sort_order'     => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/education'))->with('success', 'Education record created successfully!');
    }

    public function edit($id)
    {
        $education = $this->educationModel->find($id);
        if (!$education) {
            return redirect()->to(base_url('admin/education'))->with('error', 'Education record not found.');
        }

        $data = [
            'page_title'  => 'Edit Education Record',
            'active_menu' => 'education',
            'education'   => $education,
        ];
        return view('admin/education/edit', $data);
    }

    public function update($id)
    {
        $education = $this->educationModel->find($id);
        if (!$education) {
            return redirect()->to(base_url('admin/education'))->with('error', 'Education record not found.');
        }

        $rules = [
            'degree'         => 'required|min_length[2]|max_length[150]',
            'field_of_study' => 'required|min_length[2]|max_length[150]',
            'institution'    => 'required|min_length[2]|max_length[200]',
            'passing_year'   => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->educationModel->update($id, [
            'degree'         => $this->request->getPost('degree'),
            'field_of_study' => $this->request->getPost('field_of_study'),
            'institution'    => $this->request->getPost('institution'),
            'passing_year'   => $this->request->getPost('passing_year'),
            'grade_score'    => $this->request->getPost('grade_score'),
            'description'    => $this->request->getPost('description'),
            'sort_order'     => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/education'))->with('success', 'Education record updated successfully!');
    }

    public function delete($id)
    {
        $education = $this->educationModel->find($id);
        if ($education) {
            $this->educationModel->delete($id);
            return redirect()->to(base_url('admin/education'))->with('success', 'Education record deleted successfully.');
        }
        return redirect()->to(base_url('admin/education'))->with('error', 'Education record not found.');
    }
}
