<?php

namespace App\Logic\UseCases\Product\Category;

use App\Logic\UseCases\Filter\FilterApplier;
use App\Models\Product\Category;

class IndexCategory
{
    /**
     * Список категорий
     *
     * @param string|null $sort_field
     * @param int|bool|null $sort_direction
     * @return mixed
     */
    public function __invoke(?string $sort_field, int|bool|null $sort_direction = 1, ?array $filters = null)
    {
        $sortField = in_array($sort_field, [
            'id',
            'name',
            'created_at',
            'updated_at',
        ])
            ? $sort_field
            : 'created_at';

        $sortDirection = is_null($sort_direction) || (bool)$sort_direction ? 'asc' : 'desc';

        $query = Category::orderBy(
            $sortField,
            $sortDirection
        );

        app(FilterApplier::class)($filters, $query);

        return $query;
    }
}
