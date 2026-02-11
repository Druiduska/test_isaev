<?php

namespace App\Dto\Payment;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Исходящие платежи
 *
 * @param string $uuid_1c
 * @param Carbon|null $payment_at
 * @param array<OutgoingPaymentItemsDto>|null $items
 */
class OutgoingPaymentDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param Carbon|null $payment_at
     * @param array<OutgoingPaymentItemsDto>|null $items
     */
    public function __construct(
        public string  $uuid_1c,
        public ?Carbon $payment_at,
        public ?array  $items,
    )
    {
    }
}
