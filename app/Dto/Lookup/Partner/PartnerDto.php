<?php

namespace App\Dto\Lookup\Partner;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Партнер
 */
class PartnerDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $number_1c
     * @param string|null $name
     * @param string|null $operational_name
     * @param int|null $relationship_type_id
     * @param Carbon|null $created_at_1c
     */
    public function __construct(
        public string  $uuid_1c,
        public ?string $number_1c=null,
        public ?string $name=null,
        public ?string $operational_name=null,
        public ?int $relationship_type_id=null,
        public ?Carbon $created_at_1c=null,
    )
    {
    }
}
