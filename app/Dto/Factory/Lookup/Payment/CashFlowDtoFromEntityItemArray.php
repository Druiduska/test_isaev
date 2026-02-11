<?php

namespace App\Dto\Factory\Lookup\Payment;

use App\Dto\Lookup\Payment\CashFlowDto;

/**
 * Статьи ДДС (движения денежных средств) из массива сущности
 */
class CashFlowDtoFromEntityItemArray
{
    private const string ENTITY_PREFIX = 'item_cash_flow_';

    /**
     * @param array $data
     * @return CashFlowDto|null
     */
    public function __invoke(array $data): ?CashFlowDto
    {
        if (
            !array_key_exists(self::ENTITY_PREFIX . 'uuid_1c', $data)
            && !array_key_exists(self::ENTITY_PREFIX . 'name', $data)
        ) {
            return null;
        }

        return new CashFlowDto(
            uuid_1c: $data[self::ENTITY_PREFIX . 'uuid_1c'] ?? null,
            name: $data[self::ENTITY_PREFIX . 'name'] ?? null,
            created_at_1c: timestampToCarbon($data[self::ENTITY_PREFIX . 'created_at_1c']),
        );
    }
}
