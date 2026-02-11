<?php

namespace  App\Dto\Employee\Salary\Rule\Group;

use App\Dto\Traits\ToArrayTrait;

/**
 * Группы правил расчета заработной платы для сотрудников
 */
class EmployeeSalaryGroupRuleDto
{
    use ToArrayTrait;

    /**
     * @param int|null $id
     * @param string|null $name Название группы правил
     * @param string|null $description Описание группы правил
     * @param int|null $is_active Активность. 1 - активно, 0 - неактивно
     * @param int|null $sort Порядок сортировки
     */
    public function __construct(
        public ?int $id,
        public ?string $name = null,
        public ?string $description = null,
        public ?int $is_active = null,
        public ?int $sort = null,
    ) {}
}
