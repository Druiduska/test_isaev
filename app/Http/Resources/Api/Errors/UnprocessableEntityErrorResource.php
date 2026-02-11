<?php

namespace App\Http\Resources\Api\Errors;

use App\Enums\ResponseSlug\ResponseClientErrorSlugEnum as Slug;
use App\Http\Resources\Api\AbstractJsonResource;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UnprocessableEntityErrorResource",
 *
 *      @OA\Property(property="result", type="string", example="UNPROCESSABLE_ENTITY", description="Internal Server Error"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="errors", type="array", description="Описание ошибок",
 *          @OA\Items(
 *              type="object"
 *          ),
 *      ),
 * )
 */
class UnprocessableEntityErrorResource extends AbstractErrorResource
{
    public const RESULT = Slug::UNPROCESSABLE_ENTITY;
}
