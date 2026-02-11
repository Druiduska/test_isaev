<?php

namespace App\Dto\Factory\Payment;

use App\Dto\Payment\OutgoingPaymentDto;

/**
 * DTO Позиции исходящих платежей из массива
 */
class OutgoingPaymentDtoFromArray
{
    /**
     * @param array $data
     * @return OutgoingPaymentDto
     */
    public function __invoke(array $data): OutgoingPaymentDto
    {
        return new OutgoingPaymentDto(
            uuid_1c: $data['uuid_1c'],
            payment_at: timestampToCarbon($data['payment_at']),
            items: array_map(
                static function ($item) use ($data) {
                    $item['outgoing_payments_uuid_1c'] = $data['uuid_1c'];
                    return app(OutgoingPaymentDtoItemsFromArray::class)($item);
                }
                , $data['items']),
        );
    }
}
