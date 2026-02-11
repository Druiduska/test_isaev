<?php

namespace App\Dto\Employee\Salary;

use App\Models\Employee\Employee;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

/**
 * Dto для расчёта зарплаты сотрудника
 */
class SalaryProcessorDto
{
    /**
     * @param Employee $employee Информация о сотруднике.
     * @param EloquentCollection $salaryRules Коллекция правил расчёта зарплаты.
     * @param int $workingDaysCount Количество рабочих дней в текущем месяце.
     * @param EloquentCollection $clientOrders Коллекция заказов клиентов.
     * @param EloquentCollection $jobPositionSalaryRates Коллекция глобальных ставок по должностям.
     * @param array $periodRange Период расчёта зарплаты.
     */
    public function __construct(
        public Employee $employee,
        public EloquentCollection $salaryRules,
        public int $workingDaysCount,
        public EloquentCollection $clientOrders,
        public EloquentCollection $jobPositionSalaryRates,
        public array $periodRange,
    ) {}
}
