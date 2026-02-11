<?php

namespace App\Dto\Order\Supplier\Version;

use App\Dto\Traits\ToArrayTrait;

/**
 * Позиции заказа поставщику
 */
class SupplierOrderPositionDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid
     * @param string|null $sku
     * @param string $supplier_orders_versions_uuid
     * @param string|null $product_name
     * @param int|null $product_count
     * @param int|null $base_price
     * @param string|null $comment
     */
    public function __construct(
        public ?string $uuid,
        public ?string $sku,
        public string  $supplier_orders_versions_uuid,
        public ?string $product_name,
        public ?int    $product_count,
        public ?int    $base_price,
        public ?string $comment,
    )
    {
    }
}
