<?php

namespace App\Dto\Factory\Lookup\Partner;

use App\Dto\Lookup\Partner\PartnerDto;
use App\Enums\Lookup\Partner\PartnerTypeEnum;

/**
 * Партнеры из массива
 */
class PartnerDtoFromArray
{
    public function __invoke(array $data): PartnerDto
    {

        $relationshipTypeId = (isset($data['relationship_type_slugs']))
            ? array_reduce(
                $data['relationship_type_slugs'],
                fn($carry, $item) => $carry | PartnerTypeEnum::{$item}?->value,
                0
            )
            :null;
        return new PartnerDto(
            uuid_1c: $data['uuid_1c'],
            number_1c: $data['number_1c'] ?? null,
            name: $data['name'] ?? null,
            operational_name: $data['operational_name'] ?? null,
            relationship_type_id: $data['relationship_type_id'] ?? $relationshipTypeId,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
