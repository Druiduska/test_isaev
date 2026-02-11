<?php

namespace App\Dto\Factory\Lookup\Currency;

use App\Dto\Lookup\Currency\CurrencyRateDto;

/**
 * Курсы валют из массива
 */
class CurrencyRateDtoFromArray
{
    /**
     * @param array $data
     * @return CurrencyRateDto
     */
    public function __invoke(array $data): CurrencyRateDto
    {
        return new CurrencyRateDto(
            uuid_1c: $data['uuid_1c'] ?? null,
            rate_at: timestampToCarbon($data['rate_at']),
            currency_code: $data['currency_code'] ?? null,
            rate: $data['rate'] ?? null,
            multiplicity: $data['multiplicity'] ?? null,
        );
    }

}
