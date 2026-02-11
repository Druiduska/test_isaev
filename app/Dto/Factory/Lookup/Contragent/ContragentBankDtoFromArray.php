<?php

namespace App\Dto\Factory\Lookup\Contragent;

use App\Dto\Lookup\Contragent\ContragentBankDto;

/**
 * Банковские счета контрагентов из массива
 */
class ContragentBankDtoFromArray
{
    /**
     * @param array $data
     * @return ContragentBankDto
     */
    public function __invoke(array $data): ContragentBankDto
    {
        return new ContragentBankDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            contragent_uuid_1c: $data['contragent_uuid_1c'],
            account: $data['account'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),

        );
    }
}
