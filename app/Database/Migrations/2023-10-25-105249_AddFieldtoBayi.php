<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFieldtoBayi extends Migration
{
    public function up()
    {
        $this->forge->addColumn('bayi', [
            'tgl_lahir' => [
                'type' => 'DATE',
                'null' => TRUE,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('bayi', 'tgl_lahir');
    }
}
