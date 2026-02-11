<?php

namespace App\Dto\Factory\Employee\Salary\Rule;

use App\Dto\Employee\Salary\Rule\EmployeeSalaryRuleDto;

/**
 * DTO Правило для расчета заработной платы для сотрудника из массива
 */
class EmployeeSalaryRuleDtoFromArray
{
    /**
     * @param array $data
     * @return EmployeeSalaryRuleDto|null
     */
    public function __invoke(array $data): ?EmployeeSalaryRuleDto
    {
        $active_from_at = $data['active_from_at'] ?? null;
        $active_to_at = $data['active_to_at'] ?? null;
        $dto = new EmployeeSalaryRuleDto(
            id: $data['id'] ?? null,
            employee_salary_group_rules_id: $data['employee_salary_group_rules_id'] ?? null,
            name: $data['name'] ?? null,
            description: $data['description'] ?? null,
            active_from_at: timestampToCarbon($active_from_at),
            active_to_at: timestampToCarbon($active_to_at),
            status: $data['status'] ?? null,
            is_active: $data['is_active'] ?? null,
        );

        if (count($dto->toArray()) == 0) {
            return null;
        }

        return $dto->setKeyList(array_keys($data));
    }
}
