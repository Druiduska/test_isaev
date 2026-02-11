<?php

namespace App\Logic\UseCases\Log;

use App\Logic\Singletons\RequestData;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/**
 * Запись ошибок в произвольном виде
 */
class CustomErrorLog
{
    /**
     * @param string $name
     * @param array|null $errors
     * @return void
     */
    public function __invoke(string $name, ?array $errors): void
    {
        $request = Route::getCurrentRoute();
        $method = implode(', ', Route::getCurrentRoute()->methods());
        $uri = $request->uri();
        Log::channel(app(RequestData::class)->logChannel)->error( config( 'logging.log_separator') . $name  . config( 'logging.log_separator'),
            [
                'request_uuid' => app(RequestData::class)->request_uuid,
                'method' => $method,
                'uri' => $uri,
                'message' => $errors,
            ]);
    }
}
