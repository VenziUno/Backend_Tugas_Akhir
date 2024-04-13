<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::truncate();
        Book::insert([
            [
                'id' => 'BD001',
                'title' => 'Harry Potter and the Sorcerer\'s Stone',
                'authors_id' => 'A001',
                'statement_of_responsibility' => '-',
                'edition' => 'Edisi 1',
                'specific_detail_info' => 'Color Book',
                'gmds_id' => 'GMD001',
                'content_types_id' => 'CT001',
                'media_types_id' => 'MT001',
                'carrier_types_id' => 'CAT001',
                'publishers_id' => 'P001',
                'publisher_year' => '1997',
                'places_id' => 'PL003',
                'isbn_issn' => '9781234567888',
                'collation' => 'xiv, 200 halaman',
                'series_title' => '-',
                'call_number' => '001.23 KAT',
                'subjects_id' => 'S000',
                'doc_languages_id' => 'DL001',
                'desc' => 'Deskripsi singkat tentang buku ini.',
                'file' => 'https://res.cloudinary.com/dte3lbaid/image/upload/v1710423942/tutorial/24-03-14_134537_download.png',
                'opac' => 1,
                'labels_id' => 'L001',
                'current_stock' => 10,
                'created_at' => '2024-03-14 06:45:44',
                'updated_at' => '2024-03-14 06:45:44',
                'deleted_at' => null,
            ],
        ]);
    }
}
