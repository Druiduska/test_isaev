<?php

namespace App\Logic\UseCases\Log;

use App\Enums\HttpMethodEnum;
use App\Logic\Singletons\RequestData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

/**
 * Логирование ответа
 */
class ResponseLog
{
    protected object $requestData;

    /**
     * @param Request $request
     * @param $response
     * @return void
     */
    public function __invoke(Request $request, $response): void
    {
        $method = $request->method();
        $this->requestData = app(RequestData::class);

        // Проверка, если HTTP метод и статус в списке логируемых
        if ((int)(HttpMethodEnum::{$method}?->value) & $this->requestData->method_flag &&
            is_array($this->requestData->statuses) && in_array($response->status(), $this->requestData->statuses)) {
            $this->saveLog(
                $this->requestData->logChannel,
                $method,
                $response->getContent(),
                $response->status()
            );
        }
    }

    /**
     * Запись лога
     *
     * @param string $logChannel
     * @param string $method
     * @param mixed $data
     * @param int $statusCode
     * @return void
     */
    protected function saveLog(string $logChannel, string $method, mixed $data, int $statusCode): void
    {

        $logLevel = $this->determineLogLevel($statusCode);

        Log::channel($logChannel)
            ->{$logLevel}(
                config('logging.log_separator') .
                'Response:' . $this->requestData->request_uuid . config('logging.log_separator') .
                $method . ':' . $this->requestData->route . config('logging.log_separator') .
                'data:' . $data
            );
    }

    /**
     * Определение уровня логирования
     *
     * @param int $statusCode
     * @return string
     */
    protected function determineLogLevel(int $statusCode): string
    {
        return $statusCode >= 400 ? 'error' : 'notice';
    }
}
