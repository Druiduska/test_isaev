<?php
declare(strict_types=1);

namespace App\Logic\Singletons;

use App\Logic\UseCases\Settings\GetLogSettings;
use stdClass;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

/**
 * Параметры относящиеся к выполняемому HTTP запросу
 * @property string $request_uuid
 * @property array $validated
 * @property string $logChannel
 * @property stdClass $model
 */
class RequestData
{
    /**
     * Идентификатор UUID выполняемого запроса.
     * @var string|null
     */
    protected string $requestUuid;

    /**
     * Валидированные параметры FormRequest.
     * @var array
     */
    public array $validated = [];

    /**
     * Маршрут по которому выполняется запрос
     * @var string|null
     */
    public ?string $route = null;

    /**
     * Поле флагов с методами, которые следует логировать
     * @var int
     */
    public int $method_flag = 0b111110;

    /**
     * HTTP статусы, которые следует логировать, помимо нормального завершения (200, 201 логируются всегда).
     *
     * @var array|null
     */
    public ?array $statuses = null;

    /**
     * Канал логирования
     * @var string
     */
    public string $logChannel = 'daily';

    /**
     * Параметры модели, которая обрабатывается в запросе, необходимые во всем проекте
     * (пока только идентификаторы обрабатываемой модели).
     * @var stdClass
     */
    protected stdClass $model;

    public function __construct()
    {
        $this->requestUuid = uuid_create();
        $this->model = new stdClass();
        $logSettings = $this->getSettings();

        if (!is_null($logSettings)) {
            $this->route = $logSettings->route;
            $this->method_flag = $logSettings->method_flag;
            $this->statuses = $logSettings->statuses;
            $this->logChannel = $logSettings->chanel;
        }
    }

    /**
     * @param string $name
     * @return object|stdClass|string|void|null
     */
    public function __get(string $name)
    {
        switch ($name) {
            case 'request_uuid':
                return $this->requestUuid;
            case 'model':
                return $this->model;
        }
    }

    /**
     * @param string $name
     * @param $value
     * @return object|void
     */
    public function __set(string $name, $value)
    {
        switch ($name) {
            case 'model':
                return $this->setModel($value);
        }
    }

    /**
     * Заполнение только необходимых полей данных о модели, которая обрабатывается в запросе.
     *
     * @param object|null $model
     * @return object
     */
    protected function setModel(?object $model): object
    {
        if (!is_object($model)) {
            return $this->model;
        }
        if (property_exists($model, 'id') && (is_int($model->id) || is_null($model->id))) {
            $this->model->id = $model->id;
        }
        if (property_exists($model, 'uuid') && (Str::isUuid($model->uuid) || is_null($model->uuid))) {
            $this->model->uuid = $model->uuid;
        }
        if (property_exists($model, 'uuid_1c') && (Str::isUuid($model->uuid_1c) || is_null($model->uuid_1c))) {
            $this->model->uuid_1c = $model->uuid_1c;
        }
        return $this->model;
    }

    /**
     * @return mixed|null
     */
    protected function getSettings()
    {
        try {
            $uri = Route::getCurrentRoute()->uri;
            return app(GetLogSettings::class)($uri);
        } catch (\Throwable $e) {
            return null;
        }
    }
}

