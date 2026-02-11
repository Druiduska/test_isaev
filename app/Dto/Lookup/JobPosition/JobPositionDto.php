<?php

namespace App\Dto\Lookup\JobPosition;

use App\Dto\Traits\ToArrayTrait;

/**
 * Должность
 */
class JobPositionDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $name
     * @param int|null $is_active
     */
    public function __construct(
        public string $uuid_1c,
        public ?string $name = null,
        public ?int $is_active = null,
    ) {}
}
