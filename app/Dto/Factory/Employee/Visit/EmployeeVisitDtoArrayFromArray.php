<?php

namespace App\Dto\Factory\Employee\Visit;

use App\Dto\Employee\Visit\EmployeeVisitDto;

/**
 * Создание массива объектов EmployeeVisitDto из массива данных.
 */
class EmployeeVisitDtoArrayFromArray
{
    /**
     * Преобразует массив данных в массив объектов EmployeeVisitDto.
     *
     * @param array $data Массив данных с учетом посещения сотрудника:
     *
     * @return array Массив объектов EmployeeVisitDto
     */
    public function __invoke(array $data): array
    {
        return array_map(function ($data) {
            return new EmployeeVisitDto(
                employee_uuid_1c: $data['employee_uuid_1c'],
                date: timestampToCarbon($data['date']),
                status: $data['status'],
            );
        }, $data['data']);
    }
}
