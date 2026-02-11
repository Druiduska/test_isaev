<?php

namespace App\Dto\Product;

use App\Dto\Traits\ToArrayTrait;

/**
 * Товар
 */
class ProductDto
{
    use ToArrayTrait;

    /**
     * @param null|int $id Индекс
     * @param string $name Наименование товара
     * @param float $price Цена
     * @param int $categories_id Категория
     * @param bool $in_stock В наличии
     * @param float $rating Рейтинг
     */
    public function __construct(
        public ?int $id,
        public string $name,
        public float $price,
        public int $categories_id,
        public bool $in_stock,
        public float $rating,
    )
    {
    }
}
