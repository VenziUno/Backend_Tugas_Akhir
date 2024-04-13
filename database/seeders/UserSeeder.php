<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::truncate();
        User::insert([
            [
                'id' => 1,
                'name' => 'Master Administrator',
                'email' => 'pendicai3@gmail.com',
                'password' => bcrypt('pendichu#210'),
                'role_id' => 'RU001',
            ],
            [
                'id' => 2,
                'name' => 'Administrator',
                'email' => 'pendicai0@gmail.com',
                'password' => bcrypt('pendichu#210'),
                'role_id' => 'RU002',
            ],
            [
                'id' => 3,
                'name' => 'Pendi',
                'email' => 'pendi@gmail.com',
                'password' => bcrypt('14032001'),
                'role_id' => 'RU003',
            ],
        ]);
    }
}
