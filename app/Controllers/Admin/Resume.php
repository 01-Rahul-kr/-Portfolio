<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ResumeModel;

class Resume extends BaseController
{
    protected $resumeModel;

    public function __construct()
    {
        $this->resumeModel = new ResumeModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Manage Resume',
            'active_menu' => 'resume',
            'resume'      => $this->resumeModel->getActiveResume(),
        ];
        return view('admin/resume/index', $data);
    }

    public function upload()
    {
        $file = $this->request->getFile('resume_file');

        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'Please select a valid file to upload.');
        }

        $ext = strtolower($file->getExtension());
        if (!in_array($ext, ['pdf', 'doc', 'docx'])) {
            return redirect()->back()->with('error', 'Only PDF, DOC, or DOCX files are allowed.');
        }

        $fileName = 'Rahul_Kumar_Resume_' . time() . '.' . $ext;
        $file->move(FCPATH . 'assets/uploads/resume', $fileName);

        $fileSize = round($file->getSize() / 1024, 1) . ' KB';
        $filePath = 'assets/uploads/resume/' . $fileName;

        $existing = $this->resumeModel->first();
        if ($existing) {
            $this->resumeModel->update($existing['id'], [
                'file_path' => $filePath,
                'file_name' => $fileName,
                'file_size' => $fileSize,
            ]);
        } else {
            $this->resumeModel->insert([
                'file_path' => $filePath,
                'file_name' => $fileName,
                'file_size' => $fileSize,
            ]);
        }

        return redirect()->to(base_url('admin/resume'))->with('success', 'Resume uploaded and updated successfully!');
    }
}
