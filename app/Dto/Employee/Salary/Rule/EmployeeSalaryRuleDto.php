<?php

namespace App\Dto\Employee\Salary\Rule;

use App\Dto\Traits\ToArrayTrait;
use Carbon\Carbon;

/**
 * Правила расчета зарплаты для сотрудников
 */
class EmployeeSalaryRuleDto
{
    use ToArrayTrait;

    /**
     * @param int|null $id Id правила
     * @param int|null $employee_salary_group_rules_id Группы правил расчета заработной платы для сотрудников
     * @param string|null $name Имя правила
     * @param string|null $description Описание правила
     * @param Carbon|null $active_from_at Дата начала действия правила
     * @param Carbon|null $active_to_at Дата окончания действия правила
     * @param string|null $status Статус правила
     * @param int|null $is_active Активность. 1 - активно, 0 - неактивно
//     * @param array $conditions Условия, связанные с правилом
//     * @param array $actions Действия, связанные с правилом
     */
    public function __construct(
        public ?int    $id = null,
        public ?int    $employee_salary_group_rules_id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?Carbon $active_from_at = null,
        public ?Carbon $active_to_at = null,
        public ?string $status = null,
        public ?int    $is_active = null,
//        public array   $conditions = [],
//        public array   $actions = [],
    )
    {
    }
}
