<?php

namespace App\Dto\Factory\Lookup\Contragent;

use App\Dto\Lookup\Contragent\ContragentDto;

/**
 * Контрагенты из массива сущности
 */
class ContragentDtoFromEntityArray
{
    /**
     * @param array $data
     * @return ContragentDto|null
     */
    public function __invoke(array $data): ?ContragentDto
    {
        if (!array_key_exists('contragent_uuid_1c', $data)){
            return null;
        }
        return new ContragentDto(
            uuid_1c: $data['contragent_uuid_1c'],
            number_1c: $data['contragent_number_1c'] ?? null,
            name: $data['contragent_name'] ?? null,
            tin: $data['contragent_tin'] ?? null,
            created_at_1c: timestampToCarbon($data['contragent_created_at_1c']),
        );
    }
}
