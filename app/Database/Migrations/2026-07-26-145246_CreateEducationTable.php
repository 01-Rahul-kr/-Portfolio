<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEducationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'degree' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'field_of_study' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],
            'institution' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
            ],
            'passing_year' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'grade_score' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
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
        $this->forge->createTable('education', true);
    }

    public function down()
    {
        $this->forge->dropTable('education', true);
    }
}
