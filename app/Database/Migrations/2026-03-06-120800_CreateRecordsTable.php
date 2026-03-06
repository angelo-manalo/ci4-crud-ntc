<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRecordsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'category' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'remarks' => [
                'type'       => 'TEXT',
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

        $this->forge->addKey('id', true); // PRIMARY KEY
        $this->forge->createTable('records');
    }

    public function down()
    {
        $this->forge->dropTable('records');
    }
}
