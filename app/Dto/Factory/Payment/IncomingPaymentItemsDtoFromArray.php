<?php

namespace App\Dto\Factory\Payment;

use App\Dto\Payment\IncomingPaymentItemsDto;

/**
 * DTO Позиции входящих платежей из массива
 */
class IncomingPaymentItemsDtoFromArray
{
    /**
     * @param array $data
     * @return IncomingPaymentItemsDto
     */
    public function __invoke(array $data): IncomingPaymentItemsDto
    {
        return new IncomingPaymentItemsDto(
            incoming_payments_uuid_1c: $data['incoming_payments_uuid_1c'] ?? null,
            client_order_uuid_1c: $data['uuid_1c'] ?? null,
            amount: $data['amount'] ?? null,
            currency_code: $data['currency_code'] ?? null,
            currency_rate_at: timestampToCarbon($data['currency_rate_at'])?->startOfDay(),
        );
    }
}
