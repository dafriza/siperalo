<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // $fields = [
        //     'id_user' => [
        //         'type' => 'INT',
        //         'constraint' => 20,
        //         'unsigned' => true,
        //         'auto_increment' => true,
        //         'comment' => 'ID user'
        //     ],
        //     'username' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 30,
        //         'comment' => 'Username'
        //     ],
        //     'password' => [
        //         'type' => 'VARCHAR',
        //         'constraint' => 30,
        //         'comment' => 'Password'
        //     ],
        //     'created_at' => [
        //         'type' => 'TIMESTAMP',
        //         'default' => new RawSql('CURRENT_TIMESTAMP'),
        //     ],
        //     'updated_at' => [
        //         'type' => 'TIMESTAMP',
        //         'default' => new RawSql('CURRENT_TIMESTAMP'),
        //     ],
        //     'deleted_at' => [
        //         'type' => 'TIMESTAMP',
        //         'null' => true,
        //     ],
        // ];
        // $this->forge->addField($fields);
        // $this->forge->addKey('id_user', TRUE);
        // $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        // $this->forge->dropTable('user', true);
    }
}
