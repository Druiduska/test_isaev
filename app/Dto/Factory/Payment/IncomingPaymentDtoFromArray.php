<?php

namespace App\Dto\Factory\Payment;

use App\Dto\Payment\IncomingPaymentDto;

/**
 * DTO Входящие платежи из массива
 */
class IncomingPaymentDtoFromArray
{
    /**
     * @param array $data
     * @return IncomingPaymentDto
     */
    public function __invoke(array $data): IncomingPaymentDto
    {
        return new IncomingPaymentDto(
            uuid_1c: $data['uuid_1c'],
            payment_at: timestampToCarbon($data['payment_at']),
            items: array_map(
                static function ($item) use ($data) {
                    $item['incoming_payments_uuid_1c'] = $data['uuid_1c'];
                    return app(IncomingPaymentItemsDtoFromArray::class)($item);
                }
                , $data['items']
            ),
        );
    }
}
