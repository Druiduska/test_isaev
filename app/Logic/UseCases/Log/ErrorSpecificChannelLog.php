<?php

namespace App\Logic\UseCases\Log;

use App\Logic\Singletons\RequestData;
use Illuminate\Support\Facades\Log;

/**
 * Запись ошибок и исключений в заданный канал
 */
class ErrorSpecificChannelLog
{
    /**
     * @param \Throwable $e
     * @param string $channel
     * @return void
     */
    public function __invoke(\Throwable $e, string $channel): void
    {
        Log::channel($channel)->error(
            config( 'logging.log_separator') . $e::class . config( 'logging.log_separator'),
            [
                'request_uuid' => app(RequestData::class)?->request_uuid,
                'message' => call_method($e, 'getMessage'),
                'file' => call_method($e, 'getFile'),
                'line' => call_method($e, 'getLine'),
                'trace' => call_method($e, 'getTrace'),
                // TODO здесь следует прописать параметры исключений для логирования
            ]);
    }
}
