<?php

namespace App\Dto\Factory\Lookup\Organization;

use App\Dto\Lookup\Organization\OrganizationDto;

/**
 * Дочерние юрлица ЦТО из массива сущности
 */
class OrganizationDtoFromEntityArray
{
    /**
     * @param array $data
     * @return OrganizationDto|null
     */
    public function __invoke(array $data): ?OrganizationDto
    {
        if (!array_key_exists('organization_uuid_1c', $data)){
            return null;
        }
        return new OrganizationDto(
            uuid_1c: $data['organization_uuid_1c'],
            name: $data['organization_name'] ?? null,
            tin: $data['organization_tin'] ?? null,
            created_at_1c: timestampToCarbon($data['organization_created_at_1c']),
        );
    }
}
