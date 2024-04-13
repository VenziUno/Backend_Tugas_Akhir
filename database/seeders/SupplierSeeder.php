<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Supplier::truncate();
        Supplier::insert([
            [
                'id' => 'S001',
                'name' => 'Gramedia Batam',
                'address' => 'BCS Mall, Jl. Bunga Raya Lantai 1, Batu Selicin, Lubuk Baja, Batam City, Riau Islands 29444',
                'phone_number' => '082385705769',
                'portal_code' => '29444',
                'created_at' => '2024-02-12 05:09:39',
                'updated_at' => '2024-02-12 05:09:39',
                'deleted_at' => null,
            ],
        ]);
    }
}
