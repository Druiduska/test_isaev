<?php

namespace App\Logic\UseCases\Product\Category;

use App\Dto\Product\CategoryDto;
use App\Models\Product\Category;

class SaveCategory
{
    /**
     * Сохранение категории
     *
     * @param CategoryDto $dto
     * @return Category
     */
    public function __invoke(CategoryDto $dto): Category
    {
        return Category::updateOrCreate(
            ['id' => $dto->id],
            $dto->toArray()
        );
    }
}
