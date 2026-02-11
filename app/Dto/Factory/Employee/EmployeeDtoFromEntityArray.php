<?php

namespace App\Dto\Factory\Employee;

use App\Dto\Employee\EmployeeDto;

/**
 * Создание объекта EmployeeDto из массива сущности.
 */
class EmployeeDtoFromEntityArray
{
    /**
     * Преобразует массив данных в объект EmployeeVisitDto.
     *
     * @param array $data Массив с данными по сотруднику.
     *
     * @return EmployeeDto|null Массив объектов EmployeeVisitDto
     */
    public function __invoke(array $data): ?EmployeeDto
    {
        if (!(array_key_exists('manager_uuid_1c', $data) || array_key_exists('manager_name', $data))) {
            return null;
        }

        return new EmployeeDto(
            uuid_1c: $data['manager_uuid_1c'],
            name: $data['manager_name'] ?? null,
            category_uuid_1c: $data['category_uuid_1c'] ?? null,
            department_uuid_1c: $data['department_uuid_1c'] ?? null,
            job_position_uuid_1c: $data['job_position_uuid_1c'] ?? null,
            started_working_at: timestampToCarbon($data['started_working_at']) ?? null,
            dismissed_at: timestampToCarbon($data['dismissed_at']) ?? null,
        );
    }
}
