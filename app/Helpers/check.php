<?php
declare(strict_types=1);

/**
 * Является ли значение UUID
 *
 * @param mixed $uuid
 * @return bool
 */
function is_uuid(mixed $uuid): bool
{
    if (!is_string($uuid)) {
        return false;
    }
    $result = preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/', $uuid);
    // @todo В случае необходимости здесь следует добавить дополнительные проверки на соответствие структуре UUID
    // $result +=  preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/', $uuid);
    // $result = $condition ? 0 : 1;
    return (bool)$result;
}

if (!function_exists('validate_tin')) {
    /**
     * Валидация ИНН
     * Позаимствовано http://www.kholenkov.ru/data-validation/inn/
     * php-data-validation/src/DataValidation.php
     *
     * @param string $tin
     * @param mixed  $error_message
     * @param mixed  $error_code
     *
     * @return boolean
     */
    function validate_tin(string $tin, &$error_message = null, &$error_code = null)
    {
        $result = false;
        $tin = (string)$tin;
        if (!$tin) {
            $error_code = 1;
            $error_message = 'ИНН пуст';
        } elseif (preg_match('/[^0-9]/', $tin)) {
            $error_code = 2;
            $error_message = 'ИНН может состоять только из цифр';
        } elseif (!in_array($inn_length = strlen($tin), [10, 12])) {
            $error_code = 3;
            $error_message = 'ИНН может состоять только из 10 или 12 цифр';
        } else {
            $check_digit = function ($inn, $coefficients) {
                $n = 0;
                foreach ($coefficients as $i => $k) {
                    $n += $k * (int)substr($inn, $i, 1);
                }
                return $n % 11 % 10;
            };
            switch ($inn_length) {
                case 10:
                    $n10 = $check_digit($tin, [2, 4, 10, 3, 5, 9, 4, 6, 8]);
                    if ($n10 === (int)substr($tin, 9, 1)) {
                        $result = true;
                    }
                    break;
                case 12:
                    $n11 = $check_digit($tin, [7, 2, 4, 10, 3, 5, 9, 4, 6, 8]);
                    $n12 = $check_digit($tin, [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8]);
                    if (($n11 === (int)substr($tin, 10, 1)) && ($n12 === (int)substr($tin, 11, 1))) {
                        $result = true;
                    }
                    break;
            }
            if (!$result) {
                $error_code = 4;
                $error_message = 'Неверный ИНН';
            }
        }
        return $result;
    }
}
