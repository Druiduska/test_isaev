<?php

namespace App\Dto\Factory\Employee;

use App\Dto\Employee\EmployeeDto;
use Illuminate\Support\Facades\Log;

/**
 * Создание объекта EmployeeDto из массива данных.
 */
class EmployeeDtoFromArray
{
    /**
     * Преобразует массив данных в объект EmployeeVisitDto.
     *
     * @param array $data Массив с данными по сотруднику:
     *
     * @return EmployeeDto Массив объектов EmployeeVisitDto
     */
    public function __invoke(array $data): EmployeeDto
    {
        return new EmployeeDto(
            uuid_1c: $data['uuid_1c'],
            name: $data['name'] ?? null,
            category_uuid_1c: $data['category_uuid_1c'] ?? null,
            department_uuid_1c: $data['department_uuid_1c'] ?? null,
            job_position_uuid_1c: $data['job_position_uuid_1c'] ?? null,
            started_working_at: timestampToCarbon($data['started_working_at']) ?? null,
            dismissed_at: timestampToCarbon($data['dismissed_at']) ?? null,
            is_active: $data['is_active'] ?? null,
        );
    }
}
