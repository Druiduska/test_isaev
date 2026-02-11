<?php

namespace App\Enums\Lookup\Partner;

/**
 * Типы партнерских отношений (текст)
 */
enum PartnerTypeTextEnum: string
{
    case CLIENT =  "Клиент";
    case SUPPLIER = "Поставщик";
    case OTHER = "Прочие отношения";
}
