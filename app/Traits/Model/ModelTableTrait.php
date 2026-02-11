<?php

namespace App\Traits\Model;

/**
 * Трейт для информации о таблице модели
 */
trait ModelTableTrait
{
    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}
