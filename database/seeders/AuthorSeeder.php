<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Author::truncate();
        Author::insert([
            ['id' => 'A001', 'name' => 'Valade, Janet', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:20', 'updated_at' => '2024-02-12 04:54:20'],
            ['id' => 'A002', 'name' => 'Siever, Ellen', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:31', 'updated_at' => '2024-02-12 04:54:31'],
            ['id' => 'A003', 'name' => 'Love, Robert', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:40', 'updated_at' => '2024-02-12 04:54:40'],
            ['id' => 'A004', 'name' => 'Robbins, Arnold', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:47', 'updated_at' => '2024-02-12 04:54:47'],
            ['id' => 'A005', 'name' => 'Figgins, Stephen', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:53', 'updated_at' => '2024-02-12 04:54:53'],
            ['id' => 'A006', 'name' => 'Weber, Aaron', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:54:59', 'updated_at' => '2024-02-12 04:54:59'],
            ['id' => 'A007', 'name' => 'Kofler, Michael', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:55:05', 'updated_at' => '2024-02-12 04:55:05'],
            ['id' => 'A008', 'name' => 'Kramer, David', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:55:11', 'updated_at' => '2024-02-12 04:55:11'],
            ['id' => 'A009', 'name' => 'Raymond, Eric', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:55:43', 'updated_at' => '2024-02-12 04:55:43'],
            ['id' => 'A010', 'name' => 'Fogel, Karl', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:55:50', 'updated_at' => '2024-02-12 04:55:50'],
            ['id' => 'A011', 'name' => 'Douglas, Korry', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:55:55', 'updated_at' => '2024-02-12 04:55:55'],
            ['id' => 'A012', 'name' => 'Douglas, Susan', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:00', 'updated_at' => '2024-02-12 04:56:00'],
            ['id' => 'A013', 'name' => 'Shklar, Leon', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:07', 'updated_at' => '2024-02-12 04:56:07'],
            ['id' => 'A014', 'name' => 'Rosen, Richard', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:12', 'updated_at' => '2024-02-12 04:56:12'],
            ['id' => 'A015', 'name' => 'Woychowsky, Edmond', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:23', 'updated_at' => '2024-02-12 04:56:23'],
            ['id' => 'A016', 'name' => 'Taylor, Arlene G.', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:29', 'updated_at' => '2024-02-12 04:56:29'],
            ['id' => 'A017', 'name' => 'Stueart, Robert D.', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:35', 'updated_at' => '2024-02-12 04:56:35'],
            ['id' => 'A018', 'name' => 'Moran, Barbara B.', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:41', 'updated_at' => '2024-02-12 04:56:41'],
            ['id' => 'A019', 'name' => 'Morville, Peter', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:47', 'updated_at' => '2024-02-12 04:56:47'],
            ['id' => 'A020', 'name' => 'Rosenfeld, Louis', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:56:52', 'updated_at' => '2024-02-12 04:56:52'],
            ['id' => 'A021', 'name' => 'Robinson, Mark', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:57:00', 'updated_at' => '2024-02-12 04:57:00'],
            ['id' => 'A022', 'name' => 'Bracking, Sarah', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:57:06', 'updated_at' => '2024-02-12 04:57:06'],
            ['id' => 'A023', 'name' => 'Huffington, Arianna Stassinopoulos', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:57:13', 'updated_at' => '2024-02-12 04:57:13'],
            ['id' => 'A024', 'name' => 'Hancock, Graham', 'birth_year' => NULL, 'type' => 'P', 'created_at' => '2024-02-12 04:57:20', 'updated_at' => '2024-02-12 04:57:20'],
        ]);
    }
}
