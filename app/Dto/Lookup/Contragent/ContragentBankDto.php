<?php

namespace App\Dto\Lookup\Contragent;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Банковские счета контрагентов
 */
class ContragentBankDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid_1c
     * @param string $contragent_uuid_1c
     * @param string|null $account
     * @param Carbon|null $created_at_1c
     */
    public function __construct(
        public ?string $uuid_1c,
        public string  $contragent_uuid_1c,
        public ?string $account = null,
        public ?Carbon $created_at_1c = null,
    )
    {
    }
}
