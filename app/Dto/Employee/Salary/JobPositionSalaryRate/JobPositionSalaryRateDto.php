<?php

namespace App\Dto\Employee\Salary\JobPositionSalaryRate;

use App\Dto\Traits\ToArrayTrait;
use Carbon\Carbon;

/**
 * Глобальные ставки зарплат по должностям
 */
class JobPositionSalaryRateDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid UUID
     * @param string $job_position_uuid_1c UUID должности
     * @param string $base_salary Оклад
     * @param string $regular_bonus Регулярная премия
     * @param Carbon $valid_from_at Дата начала действия ставки
     * @param Carbon|null $valid_to_at Дата окончания действия ставки
     */
    public function __construct(
        public string $job_position_uuid_1c,
        public string $base_salary,
        public string $regular_bonus,
        public Carbon $valid_from_at,
        public ?Carbon $valid_to_at = null,
        public ?string $uuid = null,
    ) {}
}
