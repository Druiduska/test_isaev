<?php

namespace App\Http\Resources\Api;

use App\Enums\ResponseSlug\ResponseSuccessSlugEnum as Slug;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ListResponseResource",
 *
 *      @OA\Property(property="result", type="string", example="LIST", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              @OA\Schema(type="object")
 *          ),
 *      ),
 * )
 */
class ListResponseResource extends AbstractListResponseResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'result' => Slug::LIST,
            'request_uuid' => $this?->requestUuid,
            'data' => $this->data,
        ];
    }
}
