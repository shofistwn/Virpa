<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUser extends Migration
{
    public function up()
    {
        // add 2 field to table user
        $this->forge->addColumn('user', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
    }

    public function down()
    {
        // drop 2 field from table user
        $this->forge->dropColumn('user', 'created_at');
        $this->forge->dropColumn('user', 'updated_at');
    }
}
