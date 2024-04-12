<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Administrateur',
            ],
            [
                'id'    => 2,
                'title' => 'Utilisateur',
            ],
        ];

        Role::insert($roles);
    }
}
