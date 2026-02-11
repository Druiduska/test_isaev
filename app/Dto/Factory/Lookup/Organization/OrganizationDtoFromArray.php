<?php

namespace App\Dto\Factory\Lookup\Organization;

use App\Dto\Lookup\Organization\OrganizationDto;

/**
 * Дочерние юрлица ЦТО из массива
 */
class OrganizationDtoFromArray
{
    public function __invoke(array $data): OrganizationDto
    {
        return new OrganizationDto(
            uuid_1c: $data['uuid_1c'],
            name: $data['name'] ?? null,
            tin: $data['tin'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
