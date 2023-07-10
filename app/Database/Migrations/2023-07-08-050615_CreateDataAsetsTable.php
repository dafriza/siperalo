<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateDataAsetTable extends Migration
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
            'id_ralok' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'ID Ralok'
            ],
            'tipe_ralok' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'comment' => 'Tipe Ralok'
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
        $this->forge->createTable('data_asets', true);
    }

    public function down()
    {
        $this->forge->dropTable('data_asets', true);
    }
}
