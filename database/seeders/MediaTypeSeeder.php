<?php

namespace Database\Seeders;

use App\Models\MediaType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MediaType::truncate();
        MediaType::insert([
            [
                'id' => 'MT001',
                'name' => 'audio',
                'code' => 's',
                'mrac' => 's',
                'created_at' => '2024-02-12 03:51:34',
                'updated_at' => '2024-02-12 03:51:34',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT002',
                'name' => 'computer',
                'code' => 'c',
                'mrac' => 'c',
                'created_at' => '2024-02-12 03:51:47',
                'updated_at' => '2024-02-12 03:51:47',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT003',
                'name' => 'microform',
                'code' => 'h',
                'mrac' => 'h',
                'created_at' => '2024-02-12 03:51:57',
                'updated_at' => '2024-02-12 03:51:57',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT004',
                'name' => 'microscopic',
                'code' => 'p',
                'mrac' => NULL,
                'created_at' => '2024-02-12 03:53:09',
                'updated_at' => '2024-02-12 04:46:04',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT005',
                'name' => 'projected',
                'code' => 'g',
                'mrac' => 'g',
                'created_at' => '2024-02-12 04:46:18',
                'updated_at' => '2024-02-12 04:46:18',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT006',
                'name' => 'stereographic',
                'code' => 'e',
                'mrac' => NULL,
                'created_at' => '2024-02-12 04:46:32',
                'updated_at' => '2024-02-12 04:46:32',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT007',
                'name' => 'unmediated',
                'code' => 'n',
                'mrac' => 't',
                'created_at' => '2024-02-12 04:46:51',
                'updated_at' => '2024-02-12 04:46:51',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT008',
                'name' => 'video',
                'code' => 'v',
                'mrac' => 'v',
                'created_at' => '2024-02-12 04:47:02',
                'updated_at' => '2024-02-12 04:47:02',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT009',
                'name' => 'other',
                'code' => 'x',
                'mrac' => 'y',
                'created_at' => '2024-02-12 04:47:15',
                'updated_at' => '2024-02-12 04:47:15',
                'deleted_at' => NULL
            ],
            [
                'id' => 'MT010',
                'name' => 'unspecified',
                'code' => 'z',
                'mrac' => 'z',
                'created_at' => '2024-02-12 04:47:25',
                'updated_at' => '2024-02-12 04:47:25',
                'deleted_at' => NULL
            ],
        ]);
    }
}
