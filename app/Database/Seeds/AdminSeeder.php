<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password'    => password_hash('admin', PASSWORD_DEFAULT),
            ],
        ];

        // Using Query Builder
        $this->db->table('admin')->insertBatch($data);
    }
}
