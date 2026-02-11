<?php

namespace App\Dto\Payment;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Позиции исходящих платежей
 *
 */
class OutgoingPaymentItemsDto
{
    use ToArrayTrait;

    /**
     * @param string|null $outgoing_payments_uuid_1c
     * @param string|null $supplier_order_uuid_1c
     * @param int|null $amount
     * @param int|null $currency_code
     * @param Carbon|null $currency_rate_at
     */
    public function __construct(
        public ?string $outgoing_payments_uuid_1c = null,
        public ?string $supplier_order_uuid_1c = null,
        public ?int    $amount = null,
        public ?int    $currency_code = null,
        public ?Carbon $currency_rate_at = null,
    )
    {
    }
}
