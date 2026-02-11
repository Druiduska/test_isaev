<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\AbstractFormRequest;

/**
 * @OA\Schema(
 *     required={"name"},
 *     schema="SaveProductRequest",
 *     @OA\Property(property="name", type="string", description="Наименование категории товаров"),
 *     @OA\Property(property="price", type="float", description="Цена"),
 *     @OA\Property(property="categories_id", type="string", description="id Категории"),
 *     @OA\Property(property="in_stock", type="string", description="В наличии"),
 *     @OA\Property(property="rating", type="string", description="Рейтинг"),
 *
 *     example={
 *         "name": "Шкура мышки",
 *         "price": 0.4,
 *         "categories_id": 837,
 *         "in_stock": true,
 *         "rating": 4.2
 *     },
 * ),
 */
class SaveProductRequest extends AbstractFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:' . config('validation.string.max_length')],
            'price' => [
                'nullable',
                'decimal:0,2',
                'min:'. config('validation.price.amount_min'),
                'max:'. config('validation.price.amount_max')
            ],
            'categories_id' => ['nullable', 'integer', 'exists:categories,id'],
            'in_stock' => ['nullable', 'boolean'],
            'rating' => ['nullable', 'numeric:strict', 'min:0', 'max:5'],
        ];
    }

}
