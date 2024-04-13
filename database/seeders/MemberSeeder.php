<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Member::truncate();
        Member::insert([
            [
                'id' => 'M001',
                'name' => 'Pendi',
                'nis' => '2020131034',
                'rfid' => '13b869c8',
                'gender' => 'L',
                'place_of_birth' => 'Palembang',
                'date_of_birth' => '2001-03-14',
                'class' => '6',
                'address' => 'Kintamani',
                'portal_code' => '29444',
                'file' => 'https://res.cloudinary.com/dte3lbaid/image/upload/v1710424126/tutorial/24-03-14_134845_download.png',
                'notes' => '08982200998',
                'status' => 1,
                'users_id' => 3,
                'created_at' => '2024-03-14 06:48:47',
                'updated_at' => '2024-03-14 06:48:47',
            ],
        ]);
    }
}
