<?php

namespace App\Http\Resources\Api;

use App\Enums\ResponseSlug\ResponseSuccessSlugEnum as Slug;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="PaginationListResponseResource",
 *
 *      @OA\Property(property="result", type="string", example="LIST", description="Slug Ответа"),
 *      @OA\Property(property="request_uuid", type="string", example="3d46c93a-9a93-4510-b87d-3a29e4838c4f", description="Идентификатор запроса"),
 *      @OA\Property(property="data", type="array", description="Данные",
 *          @OA\Items(
 *              @OA\Schema(type="object")
 *          ),
 *      ),
 *      @OA\Property(property="pagination", type="array", description="Данные",
 *          @OA\Items(
 *              @OA\Property(property="total", type="integer", example="100500", description="Всего записей"),
 *              @OA\Property(property="count", type="integer", example="13", description="Колисество выведенных записей"),
 *              @OA\Property(property="per_page", type="integer", example="15", description="Записей на странице"),
 *              @OA\Property(property="current_page", type="integer", example="28", description="Номер текущей страницы"),
 *              @OA\Property(property="total_pages", type="integer", example="28", description="Всего страниц"),
 *          ),
 *      ),
 * )
 */
class PaginationListResponseResource extends AbstractListResponseResource
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
            'pagination' => [
                'total' => $this->resource->total(),
                'count' => $this->resource->count(),
                'per_page' => $this->resource->perPage(),
                'current_page' => $this->resource->currentPage(),
                'total_pages' => $this->resource->lastPage(),
            ]
        ];
    }
}
