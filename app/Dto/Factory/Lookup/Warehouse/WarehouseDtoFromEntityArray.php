<?php

namespace App\Dto\Factory\Lookup\Warehouse;

use App\Dto\Lookup\Warehouse\WarehouseDto;

/**
 *
 * Склад из массива сущности
 */
class WarehouseDtoFromEntityArray
{
    private const string ENTITY_PREFIX = 'warehouse_';

    /**
     * @param array $data
     * @return WarehouseDto|null
     */
    public function __invoke(array $data): ?WarehouseDto
    {
        if ( // не создаем, если пришло недостаточно данных
            !array_key_exists(self::ENTITY_PREFIX . 'uuid_1c', $data)
            || !array_key_exists(self::ENTITY_PREFIX . 'name', $data)
        ) {
            return null;
        }

        return new WarehouseDto(
            uuid_1c: $data[self::ENTITY_PREFIX . 'uuid_1c'] ?? null,
            name: $data[self::ENTITY_PREFIX . 'name'] ?? null,
            created_at_1c: timestampToCarbon($data[self::ENTITY_PREFIX . 'created_at_1c']),
        );
    }
}
