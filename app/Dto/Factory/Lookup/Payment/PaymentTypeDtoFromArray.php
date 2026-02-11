<?php

namespace App\Dto\Factory\Lookup\Payment;

use App\Dto\Lookup\Payment\PaymentTypeDto;

/**
 * Типы платежа из массива
 */
class PaymentTypeDtoFromArray
{
    /**
     * @param array $data
     * @return PaymentTypeDto
     */
    public function __invoke(array $data): PaymentTypeDto
    {
        return new PaymentTypeDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            name: $data['name'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
