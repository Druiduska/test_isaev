<?php

namespace App\Dto\Factory\Department;

use App\Dto\Department\DepartmentDto;

/**
 * Контрагенты из массива
 */
class DepartmentDtoFromArray
{
    /**
     * @param array $data
     * @return DepartmentDto|null
     */
    public function __invoke(array $data): ?DepartmentDto
    {
        if (
            !isset($data['uuid_1c'])
            || !isset($data['name'])
        ) {
            return null;
        }
        return new DepartmentDto(
            uuid_1c: $data['uuid_1c'],
            name: $data['name'] ?? null,
        );
    }
}
