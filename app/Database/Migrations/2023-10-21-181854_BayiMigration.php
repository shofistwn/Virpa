<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BayiMigration extends Migration
{
    public function up()
    {
        // create table bayis with relation to table ibus with id
        $this->forge->addField([
            'id_bayi' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => TRUE
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => TRUE,
            ],
            'kode_bayi' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'nama_bayi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
            ],
            'umur' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE,
            ],
            'berat_badan' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => TRUE,
            ],
            'tinggi_badan' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => TRUE,
            ],
            'lingkar_kepala' => [
                'type' => 'DOUBLE',
                'constraint' => '10,2',
                'null' => TRUE,
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
            ],
            'imt' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'status_gizi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('id_bayi', TRUE);
        $this->forge->createTable('bayi');
    }

    public function down()
    {
        // drop table bayi
        $this->forge->dropTable('bayi');
    }
}
