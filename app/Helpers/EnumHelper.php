<?php

namespace App\Helpers;

class EnumHelper
{
    /**
     * Конвертирует значение одного enum в соответствующее значение другого enum
     *
     * @param string $sourceEnumClass Класс исходного enum.
     * @param string $targetEnumClass Класс целевого enum.
     * @param int|string|null $value Значение для конвертации.
     * @return string|int|null
     */
    public static function convertEnum(string $sourceEnumClass, string $targetEnumClass, int|string|null $value): int|string|null
    {
        // Заведомо не допустимые значения
        if (is_null($value)) {
            return null;
        }

        $sourceEnum = $sourceEnumClass::tryFrom($value);

        if (!$sourceEnum) {
            return $value;
        }

        $sourceName = $sourceEnum->name;
        $targetEnum = $targetEnumClass::{$sourceName}?->value;

        return $targetEnum ?: $value;
    }

    public static function getEnumValueByName(string $enumClass, ?string $name): ?int
    {
        return $name !== null && defined("$enumClass::$name")
            ? constant("$enumClass::$name")->value
            : null;
    }

    /**
     * По битовому полю возвращает все имена параметров enum.
     *
     * @param string $enumClass
     * @param int|null $value
     * @return array
     */
    public static function getBitEnum(string $enumClass, ?int $value): array
    {
        $result = [];
        foreach($enumClass::cases() as $item){
            if ($item->value & $value)	{
                $result []=$item->name;
            }
        }
        return $result;
    }

    /**
     * По битовому полю возвращает все текстовые описания параметров enum.
     *
     * @param string $sourceEnumClass
     * @param string $targetEnumClass
     * @param int|string|null $value
     * @return array
     */
    public static function convertBitEnum(string $sourceEnumClass, string $targetEnumClass, int|string|null $value): array
    {
        $result = [];
        foreach($sourceEnumClass::cases() as $item){
            if ($item->value & $value)	{
                $result []= $targetEnumClass::{$item->name}?->value;
            }
        }
        return $result;

    }
}
