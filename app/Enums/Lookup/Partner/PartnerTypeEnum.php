<?php

namespace App\Enums\Lookup\Partner;

/**
 * Типы партнерских отношений
 */
enum PartnerTypeEnum: int
{
    case CLIENT = 0b1; // Клиент
    case SUPPLIER = 0b10; // Поставщик
    case OTHER = 0b100; // Прочие отношения
}
