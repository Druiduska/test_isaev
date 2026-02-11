<?php
declare(strict_types=1);

use Illuminate\Support\Carbon;

/**
 * Безопасно преобразует timestamp в Carbon для записи в БД
 *
 * @param $param
 * @return Carbon|null
 */
function timestampToCarbon(&$param): ?Carbon
{
    return
        isset($param)
        && $param
        && ((int)$param == $param)
            ? Carbon::createFromTimestamp((int)$param)
            : null;
}

if (!function_exists('to_short_number')) {
    /**
     * Преобразует строку вида "ЦБУТ-000123" в "УТ-123" или "00ЦБ-001122" в "ЦБ-1122".
     *
     * @param ?string $input Исходная строка или null
     * @return ?string Преобразованная строка или исходное значение
     */
    function to_short_number(?string $input): ?string
    {
        if (!is_string($input)) {
            return null;
        }

        // Формат 1: ЦБУТ-000123 -> УТ-123
        if (preg_match('/^ЦБУТ-\d+$/', $input)) {
            $parts = explode('-', $input);
            $prefix = str_replace('ЦБ', '', $parts[0]);
            $number = (int) $parts[1];

            return $prefix . '-' . $number;
        }

        // Формат 2: 00ЦБ-001122 -> ЦБ-1122
        if (preg_match('/^\d*ЦБ-\d+$/', $input)) {
            $parts = explode('-', $input);
            $prefix = ltrim($parts[0], '0');
            $number = (int) $parts[1];

            return $prefix . '-' . $number;
        }

        // Если формат не соответствует ни одному из ожидаемых, возвращаем исходную строку
        return $input;
    }
}

if (!function_exists('get_organization_short_name')) {
    /**
     * Преобразует полное название организации в сокращенное.
     *
     * @param ?string $fullName Полное название организации
     * @return ?string Сокращенное название или null, если соответствие не найдено
     */
    function get_organization_short_name(?string $fullName): ?string
    {
        if (!is_string($fullName)) {
            return null;
        }

        $config = config('organizations.name_mapping');

        if (!is_array($config)) {
            return $fullName;
        }

        // Преобразуем ключи в верхний регистр
        $nameMapping = array_combine(
            array_map('mb_strtoupper', array_keys($config)),
            array_values($config)
        );

        // Приводим входное название к верхнему регистру
        $fullNameUpper = mb_strtoupper($fullName);

        return $nameMapping[$fullNameUpper] ?? $fullName;
    }
}
