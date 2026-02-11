<?php

namespace App\Logic\UseCases\Product;

use App\Dto\Product\ProductDto;
use App\Models\Product\Product;
use ReflectionException;

class SaveProduct
{
    /**
     * Сохранение заказа клиента
     *
     * @param ProductDto $dto
     * @return Product
     * @throws ReflectionException
     */
    public function __invoke(ProductDto $dto): Product
    {
        $Product = Product::updateOrCreate(
            ['id' => $dto->id],
            $dto->toArray()
        );

        return $Product;
    }
}
