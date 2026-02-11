<?php

namespace App\Logic\UseCases\Product\Category;

use App\Dto\Product\CategoryDto;
use App\Models\Product\Category;

class CreateCategory
{
    /**
     * Создание категории
     *
     * @param CategoryDto|null $dto
     * @return Category|null
     */
    public function __invoke(?CategoryDto $dto): ?Category
    {
        if (is_null($dto)
            || is_null($dto->name)
        ) {
            return null;
        }

        return Category::create($dto->toArray());
    }
}
