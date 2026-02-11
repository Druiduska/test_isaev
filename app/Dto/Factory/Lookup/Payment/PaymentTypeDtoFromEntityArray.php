<?php

namespace App\Dto\Factory\Lookup\Payment;

use App\Dto\Lookup\Payment\PaymentTypeDto;

/**
 * Типы платежа из массива сущности
 */
class PaymentTypeDtoFromEntityArray
{
    private const string ENTITY_PREFIX = 'payment_type_';

    /**
     * @param array $data
     * @return PaymentTypeDto|null
     */
    public function __invoke(array $data): ?PaymentTypeDto
    {
        if (
            !array_key_exists(self::ENTITY_PREFIX . 'uuid_1c', $data)
            && !array_key_exists(self::ENTITY_PREFIX . 'name', $data)
        ) {
            return null;
        }

        return new PaymentTypeDto(
            uuid_1c: $data[self::ENTITY_PREFIX . 'uuid_1c'] ?? null,
            name: $data[self::ENTITY_PREFIX . 'name'] ?? null,
            created_at_1c: timestampToCarbon($data[self::ENTITY_PREFIX . 'created_at_1c']),
        );
    }
}
