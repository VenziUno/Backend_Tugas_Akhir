<?php

namespace Database\Seeders;

use App\Models\ConfigRfid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigRfidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ConfigRfid::truncate();
        ConfigRfid::insert([
            [
                'ip' => 'http://192.168.1.1/',
            ],
        ]);
    }
}
