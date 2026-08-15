<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProjectModel;

class Projects extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Manage Projects',
            'active_menu' => 'projects',
            'projects'    => $this->projectModel->getOrderedProjects(),
        ];
        return view('admin/projects/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add New Project',
            'active_menu' => 'projects',
        ];
        return view('admin/projects/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'        => 'required|min_length[3]|max_length[200]',
            'category'     => 'required',
            'description'  => 'required',
            'technologies' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = 'assets/images/project1.jpg';
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/uploads/projects', $newName);
            $imagePath = 'assets/uploads/projects/' . $newName;
        }

        $title = $this->request->getPost('title');
        $slug  = url_title($title, '-', true) . '-' . time();

        $this->projectModel->insert([
            'title'        => $title,
            'slug'         => $slug,
            'category'     => $this->request->getPost('category'),
            'description'  => $this->request->getPost('description'),
            'image'        => $imagePath,
            'technologies' => $this->request->getPost('technologies'),
            'github_link'  => $this->request->getPost('github_link') ?: '#',
            'demo_link'    => $this->request->getPost('demo_link') ?: '#',
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
            'sort_order'   => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/projects'))->with('success', 'Project created successfully!');
    }

    public function edit($id)
    {
        $project = $this->projectModel->find($id);
        if (!$project) {
            return redirect()->to(base_url('admin/projects'))->with('error', 'Project not found.');
        }

        $data = [
            'page_title'  => 'Edit Project',
            'active_menu' => 'projects',
            'project'     => $project,
        ];
        return view('admin/projects/edit', $data);
    }

    public function update($id)
    {
        $project = $this->projectModel->find($id);
        if (!$project) {
            return redirect()->to(base_url('admin/projects'))->with('error', 'Project not found.');
        }

        $rules = [
            'title'        => 'required|min_length[3]|max_length[200]',
            'category'     => 'required',
            'description'  => 'required',
            'technologies' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $imagePath = $project['image'];
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/uploads/projects', $newName);
            $imagePath = 'assets/uploads/projects/' . $newName;
        }

        $title = $this->request->getPost('title');

        $this->projectModel->update($id, [
            'title'        => $title,
            'category'     => $this->request->getPost('category'),
            'description'  => $this->request->getPost('description'),
            'image'        => $imagePath,
            'technologies' => $this->request->getPost('technologies'),
            'github_link'  => $this->request->getPost('github_link') ?: '#',
            'demo_link'    => $this->request->getPost('demo_link') ?: '#',
            'is_featured'  => $this->request->getPost('is_featured') ? 1 : 0,
            'sort_order'   => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/projects'))->with('success', 'Project updated successfully!');
    }

    public function delete($id)
    {
        $project = $this->projectModel->find($id);
        if ($project) {
            $this->projectModel->delete($id);
            return redirect()->to(base_url('admin/projects'))->with('success', 'Project deleted successfully.');
        }
        return redirect()->to(base_url('admin/projects'))->with('error', 'Project not found.');
    }
}
