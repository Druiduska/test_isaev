<?php

namespace App\Dto\Lookup\Organization;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Дочерние юрлица ЦТО
 */
class OrganizationDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $name
     * @param string|null $tin
     * @param Carbon|null $created_at_1c
     */
    public function __construct(
        public string  $uuid_1c,
        public ?string $name=null,
        public ?string $tin=null,
        public ?Carbon $created_at_1c=null,
    )
    {
    }
}
