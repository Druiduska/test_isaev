<?php

namespace App\Dto\Factory\Order\Supplier\Version;

use App\Dto\Order\Supplier\Version\SupplierOrderPositionDto;

/**
 * Позиции заказа поставщику из массива
 */
class SupplierOrderPositionDtoFromArray
{
    public function __invoke(array $data): SupplierOrderPositionDto
    {
        return new SupplierOrderPositionDto(
            uuid: $data['uuid'] ?? null,
            sku: $data['sku'] ?? null,
            supplier_orders_versions_uuid: $data['supplier_orders_versions_uuid'],
            product_name: $data['product_name'] ?? null,
            product_count: $data['product_count'] ?? null,
            base_price: $data['base_price'] ?? null,
            comment: $data['comment'] ?? null,
        );
    }
}
