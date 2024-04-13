<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContentType::truncate();
        ContentType::insert([
            ['id' => 'CT001', 'name' => 'cartographic dataset', 'code' => 'crd', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT002', 'name' => 'cartographic image', 'code' => 'cri', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT003', 'name' => 'cartographic moving image', 'code' => 'crm', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT004', 'name' => 'cartographic tactile image', 'code' => 'crt', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT005', 'name' => 'cartographic tactile three-dimensional form', 'code' => 'crn', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT006', 'name' => 'cartographic three-dimensional form', 'code' => 'crf', 'mrac' => 'e', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT007', 'name' => 'computer dataset', 'code' => 'cod', 'mrac' => 'm', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT008', 'name' => 'computer program', 'code' => 'cop', 'mrac' => 'm', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT009', 'name' => 'notated movement', 'code' => 'ntv', 'mrac' => 'a', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT010', 'name' => 'notated music', 'code' => 'ntm', 'mrac' => 'c', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT011', 'name' => 'performed music', 'code' => 'prm', 'mrac' => 'j', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT012', 'name' => 'sounds', 'code' => 'snd', 'mrac' => 'i', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT013', 'name' => 'spoken word', 'code' => 'spw', 'mrac' => 'i', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT014', 'name' => 'still image', 'code' => 'sti', 'mrac' => 'k', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT015', 'name' => 'tactile image', 'code' => 'tci', 'mrac' => 'k', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT016', 'name' => 'tactile notated music', 'code' => 'tcm', 'mrac' => 'c', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT017', 'name' => 'tactile notated movement', 'code' => 'tcn', 'mrac' => 'a', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT018', 'name' => 'tactile text', 'code' => 'tct', 'mrac' => 'a', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT019', 'name' => 'tactile three-dimensional form', 'code' => 'tcf', 'mrac' => 'r', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT020', 'name' => 'text', 'code' => 'txt', 'mrac' => 'a', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT021', 'name' => 'three-dimensional form', 'code' => 'tdf', 'mrac' => 'r', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT022', 'name' => 'three-dimensional moving image', 'code' => 'tdm', 'mrac' => 'g', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT023', 'name' => 'two-dimensional moving image', 'code' => 'tdi', 'mrac' => 'g', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT024', 'name' => 'other', 'code' => 'xxx', 'mrac' => 'o', 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
            ['id' => 'CT025', 'name' => 'unspecified', 'code' => 'zzz', 'mrac' => NULL, 'created_at' => '2024-02-08 00:27:46', 'updated_at' => '2024-02-08 00:27:46'],
        ]);

    }
}
