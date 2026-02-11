<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class LogSettingSeeder extends Seeder
{
    const ROWS = 70;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment(['local'])) {
            $this->runLocal();
        } elseif (App::environment(['testing'])) {
            $this->runTesting();
        } else if (App::environment(['dev', 'staging'])) {
            $this->runDev();
        } else if (App::environment(['production'])) {
            $this->runProd();
        }
    }

    /**
     * Сценарий для окружения local
     *
     * @return void
     * @throws \Exception
     */
    public function runLocal()
    {
        $this->makeRows();
    }

    /**
     * Сценарий для окружения testing
     *
     * @return void
     */
    public function runTesting()
    {
        $this->makeRows();
    }

    /**
     * Сценарий для окружения dev
     *
     * @return void
     * @throws \Exception
     */
    public function runDev()
    {
        $this->makeRows();
    }

    /**
     * Сценарий для окружения prod
     *
     * @return void
     */
    public function runProd()
    {
        $this->makeRows();
    }

    protected function makeRows()
    {
        app(SetLogSettings::class)();
    }
}
