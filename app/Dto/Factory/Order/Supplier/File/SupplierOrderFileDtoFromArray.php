<?php

namespace App\Dto\Factory\Order\Supplier\File;

use App\Dto\Order\Supplier\File\SupplierOrderFileDto;

/**
 * Позиции заказа поставщику из массива
 */
class SupplierOrderFileDtoFromArray
{
    /**
     * @param array $data
     * @return SupplierOrderFileDto
     */
    public function __invoke(array $data): SupplierOrderFileDto
    {
        return new SupplierOrderFileDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            supplier_orders_uuid_1c: $data['supplier_orders_uuid_1c'],
            file: $data['file'] ?? null,
        );
    }
}
