<?php

namespace App\Http\Resources\Api\Success;

use App\Enums\ResponseSlug\ResponseSuccessSlugEnum as Slag;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="ResponseDeletedResource",
 *
 *      @OA\Property(property="result", type="string", example="DELETED", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              type="object"
 *          ),
 *      ),
 * )
 */
class ResponseDeletedResource extends AbstractSuccessResource
{
    public const RESULT = Slag::DELETED;
}
