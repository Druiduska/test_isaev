<?php

namespace App\Dto\Employee;

use App\Dto\Traits\ToArrayTrait;
use Carbon\Carbon;

/**
 * Сотрудник
 */
class EmployeeDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $name
     * @param string|null $category_uuid_1c
     * @param string|null $department_uuid_1c
     * @param string|null $job_position_uuid_1c
     * @param Carbon|null $started_working_at
     * @param Carbon|null $dismissed_at
     * @param int|null $is_active
     */
    public function __construct(
        public string $uuid_1c,
        public ?string $name = null,
        public ?string $category_uuid_1c = null,
        public ?string $department_uuid_1c = null,
        public ?string $job_position_uuid_1c = null,
        public ?Carbon $started_working_at = null,
        public ?Carbon $dismissed_at = null,
        public ?int $is_active = null,
    ) {}
}
