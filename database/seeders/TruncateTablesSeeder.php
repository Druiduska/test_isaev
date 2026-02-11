<?php

namespace Database\Seeders;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TruncateTablesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment(['local'])) {
            $this->runLocal();
        } elseif (App::environment(['testing'])) {
            $this->runTesting();
        } elseif (App::environment(['dev', 'staging'])) {
            $this->runDev();
        }
    }

    /**
     * Сценарий для окружения local
     *
     * @return void
     */
    public function runLocal(): void
    {
        if (config('seeder.local.truncate')) {
            $this->truncateTables();
        }
    }

    /**
     * Сценарий для окружения testing
     *
     * @return void
     */
    public function runTesting(): void
    {
        $this->truncateTables();
    }

    /**
     * Сценарий для окружения dev
     *
     * @return void
     */
    public function runDev(): void
    {
        if (config('seeder.dev.truncate')) {
            $this->truncateTables();
        }

    }

    /**
     * Очистка таблиц
     *
     * @return void
     */
    protected function truncateTables(): void
    {
        if (DB::connection()->getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            User::truncate();
            Category::truncate();
            Product::truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
