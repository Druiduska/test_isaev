<?php

namespace App\Dto\Factory\Employee\Salary\Rule\Group;

use App\Dto\Employee\Salary\Rule\Group\EmployeeSalaryGroupRuleDto;

/**
 * Группы правил расчета заработной платы для сотрудников из массива
 */
class EmployeeSalaryGroupRuleDtoFromArray
{
    /**
     * @param array $data
     * @return EmployeeSalaryGroupRuleDto
     */
    public function __invoke(array $data): EmployeeSalaryGroupRuleDto
    {
        return new EmployeeSalaryGroupRuleDto(
            id:  $data['id'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            is_active: $data['is_active'] ?? 1,
            sort: $data['sort'] ?? null,
        );
    }
}
