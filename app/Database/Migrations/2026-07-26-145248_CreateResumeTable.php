<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResumeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'file_path' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'assets/uploads/resume/Satyam_Raj_Resume.pdf',
            ],
            'file_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'default'    => 'Satyam_Raj_Resume.pdf',
            ],
            'file_size' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '120 KB',
                'null'       => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('resume', true);
    }

    public function down()
    {
        $this->forge->dropTable('resume', true);
    }
}
