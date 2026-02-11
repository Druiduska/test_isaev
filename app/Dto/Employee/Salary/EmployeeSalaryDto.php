<?php

namespace App\Dto\Employee\Salary;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Зарплата сотрудников
 */
class EmployeeSalaryDto
{
    use ToArrayTrait;

    /**
     * @param string $employee_uuid_1c UUID сотрудника в 1С
     * @param Carbon $month_year Расчётный период
     * @param int|null $base_salary Оклад
     * @param int|null $one_time_payment Единоразовая выплата
     * @param int|null $salary Зарплата
     * @param int|null $total_closed_deals Количество закрытых сделок
     * @param int|null $total_amount_client Количество денег за сделки
     * @param int|null $gross_profit Валовая выручка
     * @param int|null $gross_profit_by_department Валовая выручка по отделу
     * @param int|null $bonus Премия
     * @param string|null $one_time_payment_uuid uuid единоразовой выплаты
     * @param string|null $employee_salary_rate_uuid uuid персональной ставки
     * @param float|null $percentage_of_plan_by_department Процент выполнения плана
     */
    public function __construct(
        public string $employee_uuid_1c,
        public Carbon $month_year,
        public ?int $base_salary = null,
        public ?int $one_time_payment = null,
        public ?int $salary = null,
        public ?int $total_closed_deals = null,
        public ?int $total_amount_client = null,
        public ?int $gross_profit = null,
        public ?int $gross_profit_by_department = null,
        public ?int $bonus = null,
        public ?string $one_time_payment_uuid = null,
        public ?string $employee_salary_rate_uuid = null,
        public ?float $percentage_of_plan_by_department = null,

    ) {}
}
