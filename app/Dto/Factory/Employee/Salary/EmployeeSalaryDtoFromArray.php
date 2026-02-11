<?php

namespace App\Dto\Factory\Employee\Salary;

use App\Dto\Employee\Salary\EmployeeSalaryDto;

/**
 * Создание массива объектов EmployeeSalaryDto из массива данных.
 */
class EmployeeSalaryDtoFromArray
{
    /**
     * Преобразует массив данных в массив объектов EmployeeSalaryDto.
     *
     * @param array $data Массив данных с зарплатами сотрудников.
     *
     * @return array Массив объектов EmployeeVisitDto
     */
    public function __invoke(array $data): array
    {
        return array_map(function ($item) {
            return new EmployeeSalaryDto(
                employee_uuid_1c: $item['employee_uuid_1c'],
                month_year: timestampToCarbon($item['month_year']),
                base_salary: $item['base_salary'] ?? null,
                one_time_payment: $item['one_time_payment'] ?? null,
                salary: $item['salary'] ?? null,
                total_closed_deals: $item['total_closed_deals'] ?? null,
                total_amount_client: $item['total_amount_client'] ?? null,
                gross_profit: $item['gross_profit'] ?? null,
                gross_profit_by_department: $item['gross_profit_by_department'] ?? null,
                bonus: $item['bonus'] ?? null,
                one_time_payment_uuid: $item['one_time_payment_uuid'] ?? null,
                employee_salary_rate_uuid: $item['employee_salary_rate_uuid'] ?? null,
                percentage_of_plan_by_department: $item['percentage_of_plan_by_department'] ?? null
            );
        }, $data);
    }
}
