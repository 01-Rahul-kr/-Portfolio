<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MessageModel;

class Messages extends BaseController
{
    protected $messageModel;

    public function __construct()
    {
        $this->messageModel = new MessageModel();
    }

    public function index()
    {
        $data = [
            'page_title'  => 'Contact Messages',
            'active_menu' => 'messages',
            'messages'    => $this->messageModel->orderBy('id', 'DESC')->findAll(),
        ];
        return view('admin/messages/index', $data);
    }

    public function view($id)
    {
        $message = $this->messageModel->find($id);
        if (!$message) {
            return redirect()->to(base_url('admin/messages'))->with('error', 'Message not found.');
        }

        // Mark as read
        if ($message['is_read'] == 0) {
            $this->messageModel->update($id, ['is_read' => 1]);
            $message['is_read'] = 1;
        }

        $data = [
            'page_title'  => 'View Message #' . $id,
            'active_menu' => 'messages',
            'msg'         => $message,
        ];
        return view('admin/messages/view', $data);
    }

    public function delete($id)
    {
        $message = $this->messageModel->find($id);
        if ($message) {
            $this->messageModel->delete($id);
            return redirect()->to(base_url('admin/messages'))->with('success', 'Message deleted successfully.');
        }
        return redirect()->to(base_url('admin/messages'))->with('error', 'Message not found.');
    }
}
