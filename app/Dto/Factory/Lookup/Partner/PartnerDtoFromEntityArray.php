<?php

namespace App\Dto\Factory\Lookup\Partner;

use App\Dto\Lookup\Partner\PartnerDto;
use App\Enums\Lookup\Partner\PartnerTypeEnum;

/**
 * Партнеры из массива сущности
 */
class PartnerDtoFromEntityArray
{
    private const string ENTITY_PREFIX = 'partner_';

    public function __invoke(array $data): ?PartnerDto
    {
        if ( // не создаем, если пришло недостаточно данных
            !array_key_exists(self::ENTITY_PREFIX . 'uuid_1c', $data)
            || !array_key_exists(self::ENTITY_PREFIX . 'name', $data)
        ) {
            return null;
        }

        $relationshipTypeId = (isset($data[self::ENTITY_PREFIX . 'relationship_type_slugs']))
            ? array_reduce(
                $data[self::ENTITY_PREFIX . 'relationship_type_slugs'],
                fn($carry, $item) => $carry | PartnerTypeEnum::{$item}?->value,
                0
            )
            :null;

        return new PartnerDto(
            uuid_1c: $data[self::ENTITY_PREFIX . 'uuid_1c'],
            number_1c: $data[self::ENTITY_PREFIX . 'number_1c'] ?? null,
            name: $data[self::ENTITY_PREFIX . 'name'] ?? null,
            operational_name: $data[self::ENTITY_PREFIX . 'operational_name'] ?? null,
            relationship_type_id: $relationshipTypeId,
            created_at_1c: timestampToCarbon($data[self::ENTITY_PREFIX . 'created_at_1c']),
        );
    }
}
