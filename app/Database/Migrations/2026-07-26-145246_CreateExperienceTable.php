<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateExperienceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'job_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'company' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'default'    => 'India',
                'null'       => true,
            ],
            'start_date' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'end_date' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => 'Present',
                'null'       => true,
            ],
            'is_current' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'null'       => true,
            ],
            'responsibilities' => [
                'type' => 'TEXT',
            ],
            'sort_order' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('experience', true);
    }

    public function down()
    {
        $this->forge->dropTable('experience', true);
    }
}
