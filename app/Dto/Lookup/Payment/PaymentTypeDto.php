<?php

namespace App\Dto\Lookup\Payment;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Типы платежей
 */
class PaymentTypeDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid_1c
     * @param string|null $name
     * @param Carbon|null $created_at_1c
     */
    public function __construct(
        public ?string $uuid_1c = null,
        public ?string $name = null,
        public ?Carbon $created_at_1c = null,
    )
    {
    }
}
