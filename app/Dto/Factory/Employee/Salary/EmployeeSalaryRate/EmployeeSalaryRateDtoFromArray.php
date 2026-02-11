<?php

namespace App\Dto\Factory\Employee\Salary\EmployeeSalaryRate;

use App\Dto\Employee\Salary\EmployeeSalaryRate\EmployeeSalaryRateDto;

/**
 * Создание объекта EmployeeSalaryRateDto из массива данных.
 */
class EmployeeSalaryRateDtoFromArray
{
    /**
     * Преобразует массив данных в объект EmployeeSalaryRateDto.
     *
     * @param array $data Массив с данными по зарплатной ставке.
     *
     * @return EmployeeSalaryRateDto Объект EmployeeSalaryRateDto
     */
    public function __invoke(array $data): EmployeeSalaryRateDto
    {
        return new EmployeeSalaryRateDto(
            employee_uuid_1c: $data['employee_uuid_1c'],
            base_salary: $data['base_salary'],
            regular_bonus: $data['regular_bonus'],
            valid_from_at: timestampToCarbon($data['valid_from_at']),
            valid_to_at: timestampToCarbon($data['valid_to_at']) ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }
}
