<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table            = 'messages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = ['name', 'email', 'phone', 'subject', 'message', 'is_read'];

    protected $useTimestamps = false;

    public function getUnreadCount()
    {
        return $this->where('is_read', 0)->countAllResults();
    }
}
