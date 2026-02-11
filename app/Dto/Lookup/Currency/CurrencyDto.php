<?php

namespace App\Dto\Lookup\Currency;

use App\Dto\Traits\ToArrayTrait;


/**
 * Валюты
 */
class CurrencyDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid_1c
     * @param string|null $name
     * @param int|null $code
     * @param int|null $slug
     */
    public function __construct(
        public ?string $uuid_1c = null, // UUID 1C
        public ?string $name = null, // Наименование
        public ?int $code = null, // Цифровой код
        public ?string $slug = null, // Буквенный код
    )
    {
    }
}
