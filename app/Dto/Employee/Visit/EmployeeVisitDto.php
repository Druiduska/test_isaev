<?php

namespace App\Dto\Employee\Visit;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Учет посещения сотрудников
 */
class EmployeeVisitDto
{
    use ToArrayTrait;

    /**
     * @param string $employee_uuid_1c
     * @param Carbon $date
     * @param int $status
     */
    public function __construct(
        public string $employee_uuid_1c,
        public Carbon $date,
        public int $status,
    )
    {}
}
