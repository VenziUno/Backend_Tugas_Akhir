<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus semua data yang ada sebelumnya
        Place::truncate();

        // Menambahkan data baru ke dalam tabel places
        Place::insert([
            [
                'id' => 'PL001',
                'name' => 'Hoboken, NJ',
                'created_at' => '2024-02-12 05:04:16',
                'updated_at' => '2024-02-12 05:04:16',
            ],
            [
                'id' => 'PL002',
                'name' => 'Sebastopol, CA',
                'created_at' => '2024-02-12 05:04:22',
                'updated_at' => '2024-02-12 05:04:22',
            ],
            [
                'id' => 'PL003',
                'name' => 'Indianapolis',
                'created_at' => '2024-02-12 05:04:27',
                'updated_at' => '2024-02-12 05:04:27',
            ],
            [
                'id' => 'PL004',
                'name' => 'Upper Saddle River, NJ',
                'created_at' => '2024-02-12 05:04:32',
                'updated_at' => '2024-02-12 05:04:32',
            ],
            [
                'id' => 'PL005',
                'name' => 'Westport, Conn.',
                'created_at' => '2024-02-12 05:04:37',
                'updated_at' => '2024-02-12 05:04:48',
            ],
            [
                'id' => 'PL006',
                'name' => 'London',
                'created_at' => '2024-02-12 05:04:52',
                'updated_at' => '2024-02-12 05:05:12',
            ],
            [
                'id' => 'PL007',
                'name' => 'Cambridge, Mass',
                'created_at' => '2024-02-12 05:05:19',
                'updated_at' => '2024-02-12 05:05:19',
            ],
            [
                'id' => 'PL008',
                'name' => 'New York',
                'created_at' => '2024-02-12 05:05:24',
                'updated_at' => '2024-02-12 05:05:24',
            ],
        ]);
    }
}
