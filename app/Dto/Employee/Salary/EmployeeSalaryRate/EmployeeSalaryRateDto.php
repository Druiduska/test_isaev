<?php

namespace App\Dto\Employee\Salary\EmployeeSalaryRate;

use App\Dto\Traits\ToArrayTrait;
use Carbon\Carbon;

/**
 * Персональные ставки зарплат сотрудников
 */
class EmployeeSalaryRateDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid UUID
     * @param string $employee_uuid_1c UUID должности
     * @param string $base_salary Оклад
     * @param string $regular_bonus Регулярная премия
     * @param Carbon $valid_from_at Дата начала действия ставки
     * @param Carbon|null $valid_to_at Дата окончания действия ставки
     */
    public function __construct(
        public string $employee_uuid_1c,
        public string $base_salary,
        public string $regular_bonus,
        public Carbon $valid_from_at,
        public ?Carbon $valid_to_at = null,
        public ?string $uuid = null,
    ) {}
}
