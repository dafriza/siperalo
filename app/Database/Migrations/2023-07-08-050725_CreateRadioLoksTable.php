<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateRadioLoksTable extends Migration
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
            'seri_lokomotif' => [
                'type' => 'INT',
                'constraint' => 20,
                'comment' => 'Seri Lokomotif'
            ],
            'tanggal' => [
                'type' => 'TIMESTAMP',
            ],
            'ralok_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'rtc_call' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek RTC Call'
            ],
            'pc_call' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek PC Call'
            ],
            'incoming_call' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Incoming Call'
            ],
            'clock_display' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Clock Display'
            ],
            'channel_section' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Channel Section'
            ],
            'volume' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Volume'
            ],
            'emergency_call' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Emergency Call'
            ],
            'connector' => [
                'type' => 'BOOLEAN',
                'comment' => 'Mengecek Pemasangan Connector'
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
        $this->forge->addForeignKey('ralok_id', 'data_asets', 'id_ralok');
        $this->forge->createTable('radio_loks', true);
    }

    public function down()
    {
        $this->forge->dropTable('radio_loks', true);
    }
}
