<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingsModel;

class Settings extends BaseController
{
    protected $settingsModel;

    public function __construct()
    {
        $this->settingsModel = new SettingsModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Site Settings',
            'active_menu' => 'settings',
            'settings'    => $this->settingsModel->getSettings(),
        ];
        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $settings = $this->settingsModel->getSettings();
        $id = $settings['id'] ?? 1;

        $rules = [
            'site_title'       => 'required',
            'owner_name'       => 'required',
            'profession'       => 'required',
            'current_company'  => 'required',
            'years_experience' => 'required|numeric',
            'email'            => 'required|valid_email',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $heroImagePath = $settings['hero_image'];
        $heroFile = $this->request->getFile('hero_image');
        if ($heroFile && $heroFile->isValid() && !$heroFile->hasMoved()) {
            $newName = $heroFile->getRandomName();
            $heroFile->move(FCPATH . 'assets/uploads', $newName);
            $heroImagePath = 'assets/uploads/' . $newName;
        }

        $aboutImagePath = $settings['about_image'];
        $aboutFile = $this->request->getFile('about_image');
        if ($aboutFile && $aboutFile->isValid() && !$aboutFile->hasMoved()) {
            $newName = $aboutFile->getRandomName();
            $aboutFile->move(FCPATH . 'assets/uploads', $newName);
            $aboutImagePath = 'assets/uploads/' . $newName;
        }

        $updateData = [
            'site_title'        => $this->request->getPost('site_title'),
            'meta_description'  => $this->request->getPost('meta_description'),
            'meta_keywords'     => $this->request->getPost('meta_keywords'),
            'owner_name'        => $this->request->getPost('owner_name'),
            'profession'        => $this->request->getPost('profession'),
            'current_company'   => $this->request->getPost('current_company'),
            'years_experience'  => (int) $this->request->getPost('years_experience'),
            'bio'               => $this->request->getPost('bio'),
            'career_objective'  => $this->request->getPost('career_objective'),
            'phone'             => $this->request->getPost('phone'),
            'email'             => $this->request->getPost('email'),
            'location'          => $this->request->getPost('location'),
            'google_map_iframe' => $this->request->getPost('google_map_iframe'),
            'hero_image'        => $heroImagePath,
            'about_image'       => $aboutImagePath,
        ];

        $this->settingsModel->update($id, $updateData);

        return redirect()->to(base_url('admin/settings'))->with('success', 'Site settings updated successfully!');
    }
}
