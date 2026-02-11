<?php

namespace App\Http\Resources\Api\Product;

use App\Http\Resources\Api\Product\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="ProductResource",
 *
 *      @OA\Property(property="id", type="integer", description="ID категории"),
 *      @OA\Property(property="name", type="string", description="Наименование категории товаров"),
 *      @OA\Property(property="price", type="float", description="Цена"),
 *      @OA\Property(property="category", type="array", description="Категория товара",
 *          @OA\Items(ref="#/components/schemas/CategoryResource")
 *      ),
 *      @OA\Property(property="in_stock", type="string", description="В наличии"),
 *      @OA\Property(property="rating", type="string", description="Рейтинг"),
 *      @OA\Property(property="created_at", type="string", description="Дата создания"),
 *      @OA\Property(property="updated_at", type="string", description="Дата обновления"),
 * )
 */
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'category' => new CategoryResource($this?->category),
            'in_stock' => $this->in_stock,
            'rating' => $this->rating,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
