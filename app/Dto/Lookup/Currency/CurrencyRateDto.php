<?php

namespace App\Dto\Lookup\Currency;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Курсы валют
 */
class CurrencyRateDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid_1c UUID 1C
     * @param Carbon|null $rate_at Дата курса
     * @param int|null $currency_code Цифровой код
     * @param int|null $rate Курс
     * @param int|null $multiplicity Кратность
     */
    public function __construct(
        public ?string $uuid_1c = null, // UUID 1C
        public ?Carbon $rate_at = null, // Дата курса
        public ?int $currency_code = null, // Цифровой код
        public ?int $rate = null, // Курс
        public ?int $multiplicity = null, // Кратность
    )
    {
    }
}
