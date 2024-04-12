<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'team_create',
            ],
            [
                'id'    => 22,
                'title' => 'team_edit',
            ],
            [
                'id'    => 23,
                'title' => 'team_show',
            ],
            [
                'id'    => 24,
                'title' => 'team_delete',
            ],
            [
                'id'    => 25,
                'title' => 'team_access',
            ],
            [
                'id'    => 26,
                'title' => 'projet_create',
            ],
            [
                'id'    => 27,
                'title' => 'projet_edit',
            ],
            [
                'id'    => 28,
                'title' => 'projet_show',
            ],
            [
                'id'    => 29,
                'title' => 'projet_delete',
            ],
            [
                'id'    => 30,
                'title' => 'projet_access',
            ],
            [
                'id'    => 31,
                'title' => 'tach_create',
            ],
            [
                'id'    => 32,
                'title' => 'tach_edit',
            ],
            [
                'id'    => 33,
                'title' => 'tach_show',
            ],
            [
                'id'    => 34,
                'title' => 'tach_delete',
            ],
            [
                'id'    => 35,
                'title' => 'tach_access',
            ],
            [
                'id'    => 36,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
