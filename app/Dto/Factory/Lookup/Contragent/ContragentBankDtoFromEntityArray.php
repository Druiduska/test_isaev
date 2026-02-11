<?php

namespace App\Dto\Factory\Lookup\Contragent;

use App\Dto\Lookup\Contragent\ContragentBankDto;

/**
 * Банковские счета контрагентов из массива сущности
 */
class ContragentBankDtoFromEntityArray
{
    private const string ENTITY_PREFIX = 'contragent_bank_';

    /**
     * @param array $data
     * @return ContragentBankDto
     */
    public function __invoke(array $data): ?ContragentBankDto
    {
        if (
            !array_key_exists(self::ENTITY_PREFIX . 'uuid_1c', $data)
            && !array_key_exists(self::ENTITY_PREFIX . 'account', $data)
        ) {
            return null;
        }
        return new ContragentBankDto(
            uuid_1c: $data[self::ENTITY_PREFIX . 'uuid_1c'] ?? null,
            contragent_uuid_1c: $data['contragent_uuid_1c'],
            account: $data[self::ENTITY_PREFIX . 'account'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
