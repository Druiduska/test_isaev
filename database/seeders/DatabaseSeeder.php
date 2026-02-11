<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TruncateTablesSeeder::class);
        $this->call(Settings\LogSettingSeeder::class);

        $this->call(Product\CategorySeeder::class);
        $this->call(Product\ProductSeeder::class);
    }
}
