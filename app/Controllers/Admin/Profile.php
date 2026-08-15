<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Profile extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = session()->get('user_id');
        $user = $this->userModel->find($userId);

        $data = [
            'page_title'  => 'Admin Profile',
            'active_menu' => 'profile',
            'user'        => $user,
        ];
        return view('admin/profile/index', $data);
    }

    public function update()
    {
        $userId = session()->get('user_id');
        $user   = $this->userModel->find($userId);

        $rules = [
            'full_name' => 'required|min_length[2]|max_length[150]',
            'email'     => 'required|valid_email|is_unique[users.email,id,' . $userId . ']',
            'username'  => 'required|is_unique[users.username,id,' . $userId . ']',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatarPath = $user['avatar'];
        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/uploads', $newName);
            $avatarPath = 'assets/uploads/' . $newName;

            // Auto Crop & Resize Avatar to 300x300
            try {
                $imageService = \Config\Services::image('gd');
                $imageService->withFile(FCPATH . $avatarPath)
                             ->fit(300, 300, 'center')
                             ->save(FCPATH . $avatarPath);
            } catch (\Throwable $e) {
                // Log or ignore if non-image/GD error
            }
        }

        $updateData = [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'avatar'    => $avatarPath,
        ];

        $this->userModel->update($userId, $updateData);

        session()->set([
            'username'  => $updateData['username'],
            'full_name' => $updateData['full_name'],
            'email'     => $updateData['email'],
            'avatar'    => $updateData['avatar'],
        ]);

        return redirect()->to(base_url('admin/profile'))->with('success', 'Profile updated successfully!');
    }

    public function changePassword()
    {
        $userId = session()->get('user_id');
        $user   = $this->userModel->find($userId);

        $rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[6]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');

        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Current password does not match.');
        }

        $this->userModel->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);

        return redirect()->to(base_url('admin/profile'))->with('success', 'Password changed successfully!');
    }
}
