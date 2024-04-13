<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::truncate();
        Publisher::insert([
            [
                'id' => 'P001',
                'name' => 'Wiley',
                'created_at' => '2024-02-12 04:47:51',
                'updated_at' => '2024-02-12 04:47:51',
                'deleted_at' => null,
            ],
            [
                'id' => 'P002',
                'name' => 'OReilly',
                'created_at' => '2024-02-12 04:47:55',
                'updated_at' => '2024-02-12 04:47:55',
                'deleted_at' => null,
            ],
            [
                'id' => 'P003',
                'name' => 'Apress',
                'created_at' => '2024-02-12 04:48:00',
                'updated_at' => '2024-02-12 04:48:00',
                'deleted_at' => null,
            ],
            [
                'id' => 'P004',
                'name' => 'Sams',
                'created_at' => '2024-02-12 04:48:13',
                'updated_at' => '2024-02-12 04:48:13',
                'deleted_at' => null,
            ],
            [
                'id' => 'P005',
                'name' => 'John Wiley',
                'created_at' => '2024-02-12 04:48:19',
                'updated_at' => '2024-02-12 04:48:19',
                'deleted_at' => null,
            ],
            [
                'id' => 'P006',
                'name' => 'Prentice Hall',
                'created_at' => '2024-02-12 04:48:23',
                'updated_at' => '2024-02-12 04:48:23',
                'deleted_at' => null,
            ],
            [
                'id' => 'P007',
                'name' => 'Libraries Unlimited',
                'created_at' => '2024-02-12 04:48:28',
                'updated_at' => '2024-02-12 04:48:28',
                'deleted_at' => null,
            ],
            [
                'id' => 'P008',
                'name' => 'Taylor & Francis Inc.',
                'created_at' => '2024-02-12 04:48:41',
                'updated_at' => '2024-02-12 04:48:41',
                'deleted_at' => null,
            ],
            [
                'id' => 'P009',
                'name' => 'Palgrave Macmillan',
                'created_at' => '2024-02-12 04:48:53',
                'updated_at' => '2024-02-12 04:48:53',
                'deleted_at' => null,
            ],
            [
                'id' => 'P010',
                'name' => 'Crown publishers',
                'created_at' => '2024-02-12 04:48:59',
                'updated_at' => '2024-02-12 04:48:59',
                'deleted_at' => null,
            ],
            [
                'id' => 'P011',
                'name' => 'Atlantic Monthly Press',
                'created_at' => '2024-02-12 04:49:05',
                'updated_at' => '2024-02-12 04:49:05',
                'deleted_at' => null,
            ],
        ]);
    }
}
