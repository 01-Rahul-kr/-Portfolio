<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SocialLinkModel;

class SocialLinks extends BaseController
{
    protected $socialLinkModel;

    public function __construct()
    {
        $this->socialLinkModel = new SocialLinkModel();
    }

    public function index()
    {
        $data = [
            'page_title'   => 'Social Links',
            'active_menu'  => 'social_links',
            'social_links' => $this->socialLinkModel->orderBy('sort_order', 'ASC')->findAll(),
        ];
        return view('admin/social_links/index', $data);
    }

    public function create()
    {
        $data = [
            'page_title'  => 'Add Social Link',
            'active_menu' => 'social_links',
        ];
        return view('admin/social_links/create', $data);
    }

    public function store()
    {
        $rules = [
            'platform' => 'required',
            'url'      => 'required',
            'icon'     => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->socialLinkModel->insert([
            'platform'   => $this->request->getPost('platform'),
            'url'        => $this->request->getPost('url'),
            'icon'       => $this->request->getPost('icon'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order' => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/social-links'))->with('success', 'Social link added successfully!');
    }

    public function edit($id)
    {
        $link = $this->socialLinkModel->find($id);
        if (!$link) {
            return redirect()->to(base_url('admin/social-links'))->with('error', 'Social link not found.');
        }

        $data = [
            'page_title'  => 'Edit Social Link',
            'active_menu' => 'social_links',
            'link'        => $link,
        ];
        return view('admin/social_links/edit', $data);
    }

    public function update($id)
    {
        $link = $this->socialLinkModel->find($id);
        if (!$link) {
            return redirect()->to(base_url('admin/social-links'))->with('error', 'Social link not found.');
        }

        $rules = [
            'platform' => 'required',
            'url'      => 'required',
            'icon'     => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->socialLinkModel->update($id, [
            'platform'   => $this->request->getPost('platform'),
            'url'        => $this->request->getPost('url'),
            'icon'       => $this->request->getPost('icon'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order' => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to(base_url('admin/social-links'))->with('success', 'Social link updated successfully!');
    }

    public function delete($id)
    {
        $link = $this->socialLinkModel->find($id);
        if ($link) {
            $this->socialLinkModel->delete($id);
            return redirect()->to(base_url('admin/social-links'))->with('success', 'Social link deleted successfully.');
        }
        return redirect()->to(base_url('admin/social-links'))->with('error', 'Social link not found.');
    }
}
