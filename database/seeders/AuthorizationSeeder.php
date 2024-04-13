<?php

namespace Database\Seeders;

use App\Models\Authorization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Authorization::truncate();
        Authorization::insert([
            [
                'role_id' => 'RU001',
                'menu_id' => 1,
                'sub_menu_id' => null,
                'authorization_type_id' => 1
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 1,
                'sub_menu_id' => null,
                'authorization_type_id' => 2
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 1,
                'sub_menu_id' => null,
                'authorization_type_id' => 3
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 1,
                'sub_menu_id' => null,
                'authorization_type_id' => 4
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 16,
                'authorization_type_id' => 1
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 16,
                'authorization_type_id' => 2
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 16,
                'authorization_type_id' => 3
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 16,
                'authorization_type_id' => 4
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 17,
                'authorization_type_id' => 1
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 17,
                'authorization_type_id' => 2
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 17,
                'authorization_type_id' => 3
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 17,
                'authorization_type_id' => 4
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 18,
                'authorization_type_id' => 1
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 18,
                'authorization_type_id' => 2
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 18,
                'authorization_type_id' => 3
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 18,
                'authorization_type_id' => 4
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 19,
                'authorization_type_id' => 1
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 19,
                'authorization_type_id' => 2
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 19,
                'authorization_type_id' => 3
            ],
            [
                'role_id' => 'RU001',
                'menu_id' => 7,
                'sub_menu_id' => 19,
                'authorization_type_id' => 4
            ],
        ]);
    }
}
