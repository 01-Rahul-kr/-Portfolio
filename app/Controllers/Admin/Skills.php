<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SkillModel;

class Skills extends BaseController
{
    protected $skillModel;

    public function __construct()
    {
        $this->skillModel = new SkillModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Manage Skills',
            'active_menu' => 'skills',
            'skills'      => $this->skillModel->getOrderedSkills(),
        ];
        return view('admin/skills/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add New Skill',
            'active_menu' => 'skills',
        ];
        return view('admin/skills/create', $data);
    }

    public function store()
    {
        $rules = [
            'name'       => 'required|min_length[2]|max_length[100]',
            'category'   => 'required',
            'percentage' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'icon'       => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->skillModel->insert([
            'name'       => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'percentage' => (int) $this->request->getPost('percentage'),
            'icon'       => $this->request->getPost('icon'),
            'sort_order' => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/skills'))->with('success', 'Skill added successfully!');
    }

    public function edit($id)
    {
        $skill = $this->skillModel->find($id);
        if (!$skill) {
            return redirect()->to(base_url('admin/skills'))->with('error', 'Skill not found.');
        }

        $data = [
            'page_title'  => 'Edit Skill',
            'active_menu' => 'skills',
            'skill'       => $skill,
        ];
        return view('admin/skills/edit', $data);
    }

    public function update($id)
    {
        $skill = $this->skillModel->find($id);
        if (!$skill) {
            return redirect()->to(base_url('admin/skills'))->with('error', 'Skill not found.');
        }

        $rules = [
            'name'       => 'required|min_length[2]|max_length[100]',
            'category'   => 'required',
            'percentage' => 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[100]',
            'icon'       => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->skillModel->update($id, [
            'name'       => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'percentage' => (int) $this->request->getPost('percentage'),
            'icon'       => $this->request->getPost('icon'),
            'sort_order' => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/skills'))->with('success', 'Skill updated successfully!');
    }

    public function delete($id)
    {
        $skill = $this->skillModel->find($id);
        if ($skill) {
            $this->skillModel->delete($id);
            return redirect()->to(base_url('admin/skills'))->with('success', 'Skill deleted successfully.');
        }
        return redirect()->to(base_url('admin/skills'))->with('error', 'Skill not found.');
    }
}
