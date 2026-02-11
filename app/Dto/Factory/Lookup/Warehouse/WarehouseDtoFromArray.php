<?php

namespace App\Dto\Factory\Lookup\Warehouse;

use App\Dto\Lookup\Warehouse\WarehouseDto;

/**
 * Склад из массива
 */
class WarehouseDtoFromArray
{
    /**
     * @param array $data
     * @return WarehouseDto
     */
    public function __invoke(array $data): WarehouseDto
    {
        return new WarehouseDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            name: $data['name'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
