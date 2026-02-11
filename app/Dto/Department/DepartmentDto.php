<?php

namespace App\Dto\Department;

use App\Dto\Traits\ToArrayTrait;

/**
 * Отдел
 */
class DepartmentDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string $name
     */
    public function __construct(
        public string $uuid_1c,
        public string $name,
    )
    {}
}
