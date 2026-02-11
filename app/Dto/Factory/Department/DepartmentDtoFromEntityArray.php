<?php

namespace App\Dto\Factory\Department;

use App\Dto\Department\DepartmentDto;

/**
 * Контрагенты из массива сущности
 */
class DepartmentDtoFromEntityArray
{
    /**
     * @param array $data
     * @return DepartmentDto|null
     */
    public function __invoke(array $data): ?DepartmentDto
    {
        if (
            !array_key_exists('department_uuid_1c', $data)
            || !array_key_exists('department_name', $data)) {
            return null;
        }
        return new DepartmentDto(
            uuid_1c: $data['department_uuid_1c'],
            name: $data['department_name'] ?? null,
        );
    }
}
