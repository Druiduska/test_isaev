<?php

namespace App\Dto\Factory\Lookup\Payment;

use App\Dto\Lookup\Payment\CashFlowDto;

/**
 * Статьи ДДС (движения денежных средств) из массива
 */
class CashFlowDtoFromArray
{
    /**
     * @param array $data
     * @return CashFlowDto
     */
    public function __invoke(array $data): CashFlowDto
    {
        return new CashFlowDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            name: $data['name'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
