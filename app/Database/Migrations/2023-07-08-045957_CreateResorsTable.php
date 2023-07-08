<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateResorsTable extends Migration
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
            'kode_resor' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'Kode Resor'
            ],
            'nama_resor' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'comment' => 'Nama Resor'
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
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('resors', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('resors', true);
    }
}
