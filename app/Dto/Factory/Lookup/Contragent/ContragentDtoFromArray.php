<?php

namespace App\Dto\Factory\Lookup\Contragent;

use App\Dto\Lookup\Contragent\ContragentDto;

/**
 * Контрагенты из массива
 */
class ContragentDtoFromArray
{
    /**
     * @param array $data
     * @return ContragentDto
     */
    public function __invoke(array $data): ContragentDto
    {
        return new ContragentDto(
            uuid_1c: $data['uuid_1c'],
            number_1c: $data['number_1c'] ?? null,
            name: $data['name'] ?? null,
            tin: $data['tin'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }
}
