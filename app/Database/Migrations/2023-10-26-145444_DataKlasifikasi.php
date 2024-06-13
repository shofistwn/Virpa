<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKlasifikasi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_klasifikasi' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'umur' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'berat_badan' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
            ],
            'tinggi_badan_cm' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
            ],
            'tinggi_badan_m' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
            ],
            'lingkar_kepala' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => TRUE,
            ],
            'imt' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'status_gizi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id_klasifikasi', true);
        $this->forge->createTable('data_klasifikasi');
    }

    public function down()
    {
        $this->forge->dropTable('data_klasifikasi');
    }
}
