<?php

namespace App\Logic\UseCases\Settings;

use  App\Models\Settings\LogSettings;

/**
 * Получить настройки логирования для роута
 */
class GetLogSettings
{
    /**
     * @param string $route
     * @return LogSettings|null
     */
    public function __invoke(string $route): ?LogSettings
    {
        return LogSettings::where('route', 'LIKE', $route)->first();
    }
}
