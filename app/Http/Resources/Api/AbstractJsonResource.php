<?php

namespace App\Http\Resources\Api;

use App\Logic\Singletons\RequestData;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Базовый класс для всех ресурсов,
 * Если возникнет потребность сделать передавать какие-то специфические данные для каких то сущностей,
 * пожалуйста порождайте от этого класса новые абстрактные классы
 *
 */
abstract class AbstractJsonResource extends JsonResource
{
    protected RequestData $requestData;
    protected ?string $requestUuid=null;

    public function __construct($resource)
    {
        $this->requestData = app(RequestData::class);
        $this->requestUuid = $this->requestData->request_uuid;

        parent::__construct($resource);
    }

}
