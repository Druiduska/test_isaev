<?php

namespace App\Logic\UseCases\Log;

use App\Enums\HttpMethodEnum;
use App\Logic\Singletons\RequestData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/**
 * Логирование запроса
 */
class RequestLog
{
    /**
     * @var RequestData
     */
    protected object $requestData;

    /**
     * @return void
     */
    public function __invoke(Request $request): void
    {
        $method = $request->method();
        $this->requestData = app(RequestData::class);
        // HTTP метод есть в списке логируемых
        if (
            (int)(HttpMethodEnum::{$method}?->value) & $this->requestData->method_flag
        ){
            $this->saveLog($this->requestData->logChannel, $method, $request->all());
        }
    }

    /**
     * Запись лога
     *
     * @param string $name
     * @param array|null $data
     * @return void
     */
    protected function saveLog(string $logChannel, string $method, ?array $data): void
    {
        Log::channel($logChannel)
            ->notice(
                config( 'logging.log_separator') .
                'Request:' . $this->requestData->request_uuid . config( 'logging.log_separator')
                . $method . ':' . $this->requestData->route . config( 'logging.log_separator')
                . 'data:' . json_encode($data)
            );
    }
}
