<?php

namespace App\Logic\UseCases\Product;

use App\Logic\UseCases\Filter\FilterApplier;
use App\Models\Product\Product;

class IndexProduct
{
    /**
     * Список заказов клиента
     *
     * @param string|null $sort_field
     * @param int|bool|null $sort_direction
     * @param array $filters
     * @return mixed
     */
    public function __invoke(
        ?string       $sort_field,
        int|bool|null $sort_direction = null,
        array         $filters = []
    ): mixed
    {
        $sortField = in_array($sort_field, [
            'id',
            'name',
            'price',
            'rating',
            'created_at',
            'updated_at',
        ])
            ? $sort_field
            : 'id'; // Сортировка по умолчанию

        $sortDirection = !is_null($sort_direction) && (boolean)$sort_direction
            ? 'asc'
            : 'desc';


        $query = Product::orderBy(
            $sortField,
            $sortDirection
        )
            ->with('category');

        app(FilterApplier::class)($filters, $query, ['name']);

        return $query;
    }
}
