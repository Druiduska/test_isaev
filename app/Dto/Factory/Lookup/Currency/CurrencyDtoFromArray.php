<?php

namespace App\Dto\Factory\Lookup\Currency;

use App\Dto\Lookup\Currency\CurrencyDto;

/**
 * Валюты из массива
 */
class CurrencyDtoFromArray
{
    /**
     * @param array $data
     * @return CurrencyDto
     */
    public function __invoke(array $data): CurrencyDto
    {
        return new CurrencyDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            name: $data['name'] ?? null,
            code: $data['code'] ?? null,
            slug: $data['slug'] ?? null
        );
    }
}
