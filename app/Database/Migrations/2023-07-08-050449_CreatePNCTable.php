<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreatePNCTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nipp' => [
                'type' => 'INT',
                'constraint' => 20,
                'comment' => 'NIPP'
            ],
            'nama_pnc' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'comment' => 'Nama PNC'
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 20,
                'unsigned' => true,
                'comment' => 'id user'
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('PNC', true);
    }

    public function down()
    {
        $this->forge->dropTable('PNC', true);
    }
}
