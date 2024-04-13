<?php

namespace Database\Seeders;

use App\Models\DocLanguage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DocLanguage::truncate();
        DocLanguage::insert([
        [
            'id' => 'DL001',
            'name' => 'Indonesia',
            'created_at' => '2024-02-12 05:07:35',
            'updated_at' => '2024-02-12 05:07:35',
        ],
        [
            'id' => 'DL002',
            'name' => 'English',
            'created_at' => '2024-02-12 05:07:47',
            'updated_at' => '2024-02-12 05:07:47',
        ],
    ]);
    }
}
