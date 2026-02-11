<?php

namespace App\Dto\Factory\Order\Supplier\Version;

use App\Dto\Order\Supplier\Version\SupplierOrderPositionDto;

/**
 * Позиции заказа поставщику из параметров пост запроса
 */
class SupplierOrderPositionDtoFromPost
{
    /**
     * @param array $data
     * @param string $supplier_orders_versions_uuid
     * @return SupplierOrderPositionDto
     */
    public function __invoke(array $data, string $supplier_orders_versions_uuid): SupplierOrderPositionDto
    {
        $data['supplier_orders_versions_uuid'] = $supplier_orders_versions_uuid;
        return app (SupplierOrderPositionDtoFromArray::class)($data);
    }
}
