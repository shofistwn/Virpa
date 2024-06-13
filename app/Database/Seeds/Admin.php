<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        // create admin user with level admin and user with level ibu
        $data = [
            [
                'nama_user' => 'Admin',
                'telepon' => '081234567890',
                'email' => 'admin@gmail.com',
                'username' => 'admin',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'level' => 'admin',
            ],
            [
                'nama_user' => 'Ibu',
                'telepon' => '081234567890',
                'email' => 'ibu@gmail.com',
                'username' => 'ibu',
                'password' => password_hash('ibu', PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'level' => 'ibu',
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}
