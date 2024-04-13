<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RoleSeeder::class,
            ConfigRfidSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            SubMenuSeeder::class,
            AuthorizationTypeSeeder::class,
            AuthorizationSeeder::class,
            AuthorSeeder::class,
            CarrierTypeSeeder::class,
            CollectionTypeSeeder::class,
            ContentTypeSeeder::class,
            DocLanguageSeeder::class,
            GmdSeeder::class,
            ItemStatusSeeder::class,
            LabelSeeder::class,
            MediaTypeSeeder::class,
            PlaceSeeder::class,
            PublisherSeeder::class,
            SupplierSeeder::class,
            SubjectSeeder::class,
            BookSeeder::class,
            BookDetailStatusSeeder::class,
            MemberSeeder::class,
        ]);
    }
}
