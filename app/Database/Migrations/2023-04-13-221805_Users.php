<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'unsigned'          =>  true,
                'auto_increment'    =>  true
            ],
            'firstname' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
            ],
            'lastname' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'unique'        => true,
                'constraint'    => '255'
            ],
            'phone' => [
                'type'          => 'VARCHAR',
                'constraint'    => '50'
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255'
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
