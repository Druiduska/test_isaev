<?php

namespace App\Dto\Factory\Product\Category;

use App\Dto\Product\CategoryDto;

/**
 * Категория из массива
 */
class CategoryDtoFromArray
{
    /**
     * @param array $data
     * @return CategoryDto|null
     */
    public function __invoke(array $data): ?CategoryDto
    {
        if ( !isset($data['id'])
            && !isset($data['name'])
        ) {
            return null;
        }
        return new CategoryDto(
            id: $data['id'] ?? null,
            name: $data['name']
        );
    }
}
