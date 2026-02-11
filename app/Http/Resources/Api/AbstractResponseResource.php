<?php

namespace App\Http\Resources\Api;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="AbstractResponseResource",
 *
 *      @OA\Property(property="result", type="string", example="SOMETHING ERROR", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              @OA\Schema(type="object")
 *          ),
 *      ),
 * )
 */
abstract class AbstractResponseResource extends AbstractListResponseResource
{
    public const RESULT = '';

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
        if (is_array($this->data)) {
                $result['data'] = $this->data;
        }
        return $result;
    }
}
