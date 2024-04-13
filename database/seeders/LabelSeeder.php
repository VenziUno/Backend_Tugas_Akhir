<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus semua data yang ada sebelumnya
        Label::truncate();

        // Menambahkan data baru ke dalam tabel labels
        Label::insert([
            [
                'id' => 'L001',
                'name' => 'New Title',
                'created_at' => '2024-02-12 05:08:17',
                'updated_at' => '2024-02-12 05:08:17',
            ],
            [
                'id' => 'L002',
                'name' => 'Favorite Title',
                'created_at' => '2024-02-12 05:08:25',
                'updated_at' => '2024-02-12 05:08:25',
            ],
            [
                'id' => 'L003',
                'name' => 'Multimedia',
                'created_at' => '2024-02-12 05:08:31',
                'updated_at' => '2024-02-12 05:08:31',
            ],
        ]);
    }
}
