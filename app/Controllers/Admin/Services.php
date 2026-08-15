<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;

class Services extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Manage Services',
            'active_menu' => 'services',
            'services'    => $this->serviceModel->getOrderedServices(),
        ];
        return view('admin/services/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add New Service',
            'active_menu' => 'services',
        ];
        return view('admin/services/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[3]|max_length[150]',
            'icon'        => 'required',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->serviceModel->insert([
            'title'       => $this->request->getPost('title'),
            'icon'        => $this->request->getPost('icon'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/services'))->with('success', 'Service added successfully!');
    }

    public function edit($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Service not found.');
        }

        $data = [
            'page_title'  => 'Edit Service',
            'active_menu' => 'services',
            'service'     => $service,
        ];
        return view('admin/services/edit', $data);
    }

    public function update($id)
    {
        $service = $this->serviceModel->find($id);
        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Service not found.');
        }

        $rules = [
            'title'       => 'required|min_length[3]|max_length[150]',
            'icon'        => 'required',
            'description' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->serviceModel->update($id, [
            'title'       => $this->request->getPost('title'),
            'icon'        => $this->request->getPost('icon'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/services'))->with('success', 'Service updated successfully!');
    }

    public function delete($id)
    {
        $service = $this->serviceModel->find($id);
        if ($service) {
            $this->serviceModel->delete($id);
            return redirect()->to(base_url('admin/services'))->with('success', 'Service deleted successfully.');
        }
        return redirect()->to(base_url('admin/services'))->with('error', 'Service not found.');
    }
}
