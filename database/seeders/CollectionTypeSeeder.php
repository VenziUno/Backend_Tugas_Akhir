<?php

namespace Database\Seeders;

use App\Models\CollectionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CollectionType::truncate();
        CollectionType::insert([
            [
                'id' => 'COT001',
                'name' => 'Reference',
                'created_at' => '2024-02-12 05:06:54',
                'updated_at' => '2024-02-12 05:06:54',
            ],
            [
                'id' => 'COT002',
                'name' => 'Textbook',
                'created_at' => '2024-02-12 05:06:59',
                'updated_at' => '2024-02-12 05:06:59',
            ],
            [
                'id' => 'COT003',
                'name' => 'Fiction',
                'created_at' => '2024-02-12 05:07:03',
                'updated_at' => '2024-02-12 05:07:03',
            ],
        ]);


    }
}
