<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::truncate();
        Menu::insert([
            [
                'id'  => 1,
                'name' => 'Dashboard',
                'route_name' => 'dashboard',
            ],
            [
                'id'  => 2,
                'name' => 'Master',
                'route_name' => 'master',
            ],
            [
                'id'  => 3,
                'name' => 'Book',
                'route_name' => 'book',
            ],
            [
                'id'  => 4,
                'name' => 'Member',
                'route_name' => 'member',
            ],
            [
                'id'  => 5,
                'name' => 'Transaction',
                'route_name' => 'transaction',
            ],
            [
                'id'  => 6,
                'name' => 'Report',
                'route_name' => 'report',
            ],
            [
                'id'  => 7,
                'name' => 'Settings',
                'route_name' => 'setting',
            ],
        ]);
    }
}
