<?php

namespace Database\Seeders;

use App\Models\ItemStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ItemStatus::truncate();

        // Menambahkan data baru ke dalam tabel item_statuses
        ItemStatus::insert([
            [
                'id' => 'IS001',
                'name' => 'Available',
                'code' => 'AV',
                'created_at' => '2024-02-12 05:06:07',
                'updated_at' => '2024-02-19 08:08:59',
            ],
            [
                'id' => 'IS002',
                'name' => 'No Loan',
                'code' => 'NL',
                'created_at' => '2024-02-12 05:06:22',
                'updated_at' => '2024-02-12 05:06:22',
            ],
            [
                'id' => 'IS003',
                'name' => 'Missing',
                'code' => 'MIS',
                'created_at' => '2024-02-12 05:06:29',
                'updated_at' => '2024-02-12 05:06:29',
            ],
            [
                'id' => 'IS004',
                'name' => 'Repair',
                'code' => 'R',
                'created_at' => '2024-02-19 07:52:16',
                'updated_at' => '2024-02-19 08:09:10',
            ],
        ]);
    }
}
