<?php

namespace Database\Seeders;

use App\Models\BookDetailStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookDetailStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BookDetailStatus::truncate();
        BookDetailStatus::insert([
            [
                'id' => 1,
                'isbn_issn' => '9781234567888001',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 08:45:35',
            ],
            [
                'id' => 2,
                'isbn_issn' => '9781234567888002',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 08:45:38',
            ],
            [
                'id' => 3,
                'isbn_issn' => '9781234567888003',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 4,
                'isbn_issn' => '9781234567888004',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 5,
                'isbn_issn' => '9781234567888005',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 6,
                'isbn_issn' => '9781234567888006',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 7,
                'isbn_issn' => '9781234567888007',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 8,
                'isbn_issn' => '9781234567888008',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 9,
                'isbn_issn' => '9781234567888009',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
            [
                'id' => 10,
                'isbn_issn' => '9781234567888010',
                'item_statuses_id' => 'IS001',
                'books_id' => 'BD001',
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
            ],
        ]);
    }
}
