<?php

namespace Database\Seeders;

use App\Models\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubMenu::truncate();
        SubMenu::insert([
            [
                'name' => 'GMD',
                'menu_id' => 2,
                'route_name' => 'gmd'
            ],
            [
                'name' => 'Media Type',
                'menu_id' => 2,
                'route_name' => 'mediaType'
            ],
            [
                'name' => 'Content Type',
                'menu_id' => 2,
                'route_name' => 'contentType'
            ],
            [
                'name' => 'Carrier Type',
                'menu_id' => 2,
                'route_name' => 'carrierType'
            ],
            [
                'name' => 'Publisher',
                'menu_id' => 2,
                'route_name' => 'publisher'
            ],
            [
                'name' => 'Supplier',
                'menu_id' => 2,
                'route_name' => 'supplier'
            ],
            [
                'name' => 'Author',
                'menu_id' => 2,
                'route_name' => 'author'
            ],
            [
                'name' => 'Subject',
                'menu_id' => 2,
                'route_name' => 'subject'
            ],
            [
                'name' => 'Location',
                'menu_id' => 2,
                'route_name' => 'location'
            ],
            [
                'name' => 'Place',
                'menu_id' => 2,
                'route_name' => 'place'
            ],
            [
                'name' => 'Item Status',
                'menu_id' => 2,
                'route_name' => 'itemStatus'
            ],
            [
                'name' => 'Collation Type',
                'menu_id' => 2,
                'route_name' => 'collationType'
            ],
            [
                'name' => 'Doc Language',
                'menu_id' => 2,
                'route_name' => 'docLanguage'
            ],
            [
                'name' => 'Label',
                'menu_id' => 2,
                'route_name' => 'label'
            ],
            [
                'name' => 'BookDetail',
                'menu_id' => 3,
                'route_name' => 'bookDetail'
            ],
            [
                'name' => 'Role',
                'menu_id' => 7,
                'route_name' => 'role'
            ],
            [
                'name' => 'Admin',
                'menu_id' => 7,
                'route_name' => 'admin'
            ],
            [
                'name' => 'Authorization',
                'menu_id' => 7,
                'route_name' => 'authorization'
            ],
            [
                'name' => 'Config RFID',
                'menu_id' => 7,
                'route_name' => 'configRfid'
            ],
        ]);
    }
}
