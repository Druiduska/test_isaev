<?php

namespace App\Http\Resources\Api\Errors;

use App\Enums\ResponseSlug\ResponseServerErrorSlugEnum as Slug;
use App\Logic\UseCases\Log\ErrorLog;
use OpenApi\Annotations as OA;
use Throwable;

/**
 * @OA\Schema(
 *     schema="InternalServerErrorResource",
 *
 *      @OA\Property(property="result", type="string", example="INTERNAL_SERVER_ERROR", description="Internal Server Error"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="errors", type="array",
 *          @OA\Items(
 *              @OA\Property(property="message", type="string", example="Division by zero", description="Internal Server Error"),
 *              @OA\Property(property="file", type="string", example="/var/www/html/app/Http/Controllers/Api/V1/TestController.php", description="Файл в котором произошла ошибка"),
 *              @OA\Property(property="line", type="integer", example=71, description="Строка на которой произошла ошибка"),
 *              @OA\Property(property="errors", type="array",
 *                  @OA\Items(
 *                    @OA\Property(property="file", type="string", example="/var/www/html/app/Http/Controllers/Api/V1/TestController.php", description="Файл в котором произошла ошибка"),
 *                    @OA\Property(property="line", type="integer", example=21, description="Строка на которой произошла ошибка"),
 *                    @OA\Property(property="function", type="string", example="bar", description="Функция в которой произошла ошибка"),
 *                    @OA\Property(property="class", type="string", example="BaClass", description="Класс в котором произошла ошибка"),
 *                    @OA\Property(property="type", type="string", example="->", description="Тип ошибки"),
 *                 )
 *              ),
 *          )
 *      ),
 * )
 */
class InternalServerErrorResource extends AbstractErrorResource
{
    public const RESULT = Slug::INTERNAL_SERVER_ERROR;

    public function __construct($resource, mixed $errors = null)
    {
        parent::__construct($resource, $errors);
        if (!is_null($errors) || $resource instanceof Throwable) {
            if (!app()->isProduction()) {
                $this->data = [
                    [

                        'message' => call_method($this->resource, 'getMessage'),
                        'file' => call_method($this->resource, 'getFile'),
                        'line' => call_method($this->resource, 'getLine'),
                        'trace' => call_method($this->resource, 'getTrace'),
                    ],
                ];
            }
        }
    }
}
