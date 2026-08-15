<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'site_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'Rahul Kumar | Senior PHP & CodeIgniter Developer Portfolio',
            ],
            'meta_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'meta_keywords' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'owner_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'Rahul Kumar',
            ],
            'profession' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'default'    => 'PHP Developer',
            ],
            'current_company' => [
                'type'       => 'VARCHAR',
                'constraint' => 200,
                'default'    => 'Suropriyo Enterprises Private Limited',
                'null'       => true,
            ],
            'years_experience' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 3,
                'null'       => true,
            ],
            'bio' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'career_objective' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'default'    => '+91 98765 43210',
                'null'       => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'rahulkumar.dev@example.com',
                'null'       => true,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'default'    => 'India',
                'null'       => true,
            ],
            'google_map_iframe' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hero_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'assets/images/hero_rahul.jpg',
                'null'       => true,
            ],
            'about_image' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'default'    => 'assets/images/about_rahul.jpg',
                'null'       => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('settings', true);
    }
}
