<?php

namespace App\Dto\Product;

use App\Dto\Traits\ToArrayTrait;

/**
 * Категория
 */
class CategoryDto
{
    use ToArrayTrait;

    /**
     * @param null|int $id Индекс
     * @param string $name Наименование категории
     */
    public function __construct(
        public ?int   $id,
        public string $name
    )
    {
    }
}
