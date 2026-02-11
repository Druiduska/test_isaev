<?php

namespace Database\Seeders\Product;

use App\Models\Product\Category;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

/**
 * Сиды категорий
 */
class CategorySeeder extends Seeder
{
    const int ROWS = 10;

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
     * @throws Exception
     */
    public function runLocal(): void
    {
        $this->makeRows();
    }

    /**
     * Сценарий для окружения testing
     *
     * @return void
     */
    public function runTesting(): void
    {
        $this->makeRows();
    }

    /**
     * Сценарий для окружения dev
     *
     * @return void
     * @throws Exception
     */
    public function runDev(): void
    {
        $this->makeRows();
    }

    protected function makeRows(): void
    {
        Category::factory(static::ROWS)
            ->create();
    }
}
