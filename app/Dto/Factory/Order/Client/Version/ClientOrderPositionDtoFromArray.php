<?php

namespace App\Dto\Factory\Order\Client\Version;

class ClientOrderPositionDtoFromArray
{
    public function __invoke(array $data): \App\Dto\Order\Client\Version\ClientOrderPositionDto
    {
        return new \App\Dto\Order\Client\Version\ClientOrderPositionDto(
            uuid: $data['uuid'] ?? null,
            sku: $data['sku'] ?? null,
            client_orders_versions_uuid: $data['client_orders_versions_uuid'],
            product_name: $data['product_name'] ?? null,
            product_count: $data['product_count'] ?? null,
            base_price: $data['base_price'] ?? null,
            comment: $data['comment'] ?? null,
        );
    }
}
