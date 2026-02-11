<?php

namespace App\Dto\Factory\Payment;

use App\Dto\Payment\OutgoingPaymentItemsDto;

/**
 * DTO Позиции исходящих платежей из массива
 */
class OutgoingPaymentDtoItemsFromArray
{
    /**
     * @param array $data
     * @return OutgoingPaymentItemsDto
     */
    public function __invoke(array $data): OutgoingPaymentItemsDto
    {
        return new OutgoingPaymentItemsDto(
            outgoing_payments_uuid_1c: $data['outgoing_payments_uuid_1c'] ?? null,
            supplier_order_uuid_1c: $data['uuid_1c'] ?? null,
            amount: $data['amount'] ?? null,
            currency_code: $data['currency_code'] ?? null,
            currency_rate_at: timestampToCarbon($data['currency_rate_at'])?->startOfDay(),
        );
    }
}
