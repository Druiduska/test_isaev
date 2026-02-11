<?php

namespace App\Dto\Payment;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Позиции входящих платежей
 *
 */
class IncomingPaymentItemsDto
{
    use ToArrayTrait;

    /**
     * @param string|null $incoming_payments_uuid_1c
     * @param string|null $client_order_uuid_1c
     * @param int|null $amount
     * @param int|null $currency_code
     * @param Carbon|null $currency_rate_at
     */
    public function __construct(
        public ?string $incoming_payments_uuid_1c = null,
        public ?string $client_order_uuid_1c = null,
        public ?int    $amount = null,
        public ?int    $currency_code = null,
        public ?Carbon $currency_rate_at = null,
    )
    {
    }
}
