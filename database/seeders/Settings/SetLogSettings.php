<?php

namespace Database\Seeders\Settings;

use App\Models\Settings\LogSettings;

class SetLogSettings
{
    public function __invoke()
    {
        $data = require __DIR__ . '/LogSettingData/LogSettingData.php';
        foreach ($data as $item) {
            LogSettings::updateOrCreate([
                'route' => $item['route']
            ],
                $item
            );
        }
    }
}
