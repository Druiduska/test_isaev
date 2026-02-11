<?php

namespace App\Http\Resources\Api\Errors;

use App\Http\Resources\Api\AbstractResponseResource;
use OpenApi\Annotations as OA;


/**
 * @OA\Schema(
 *     schema="AbstractErrorResource",
 *
 *      @OA\Property(property="result", type="string", example="SOMETHING_ERROR", description="Slug ошибки"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="errors", type="array", description="Описание ошибок",
 *          @OA\Items(
 *              type="object"
 *          ),
 *      ),
 * )
 */
class AbstractErrorResource extends AbstractResponseResource
{
    public const RESULT = '';

    /**
     * @param $resource
     * @param array|null $errors
     */
    public function __construct($resource, mixed $errors = null)
    {
        parent::__construct($resource, $errors);
    }

    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $result = [
            'result' => static::RESULT,
            'request_uuid' => $this?->requestUuid
        ];
        if (is_array($this->data) && count($this->data)){
            $result['errors'] = $this->data;
        }
        return $result;
    }
}
