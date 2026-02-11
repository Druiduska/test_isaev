<?php

namespace App\Http\Resources\Api\Product\Category;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="CategoryResource",
 *
 *      @OA\Property(property="id", type="integer", description="ID категории"),
 *      @OA\Property(property="name", type="string", description="Наименование категории товаров"),
 *      @OA\Property(property="created_at", type="string", description="Дата создания"),
 *      @OA\Property(property="updated_at", type="string", description="Дата обновления"),
 * )
 */
class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
