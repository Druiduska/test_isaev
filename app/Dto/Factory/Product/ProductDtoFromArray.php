<?php

namespace App\Dto\Factory\Product;

use App\Dto\Product\ProductDto;

/**
 * Категория из массива
 */
class ProductDtoFromArray
{
    /**
     * @param array $data
     * @return ProductDto|null
     */
    public function __invoke(array $data): ?ProductDto
    {
        if (!isset($data['id'])
            && !isset($data['name'])
            // TODO необходимо уточнить бизнесправила создания и изменения товара
        ) {
            return null;
        }
        return new ProductDto(
            id: $data['id'] ?? null,
            name: $data['name'],
            price: $data['price'],
            categories_id: $data['categories_id'],
            in_stock: $data['in_stock'],
            rating: $data['rating'],
        );
    }
}
