<?php

return [
// Размер типа integer пока валидируется средствами Laravel, в будущем, вероятно, будет использоваться в кастомниых правилах валидации.
    "integer" => [
//        'tiny_int_min' => env('TINY_INT_MIN', -128),
//        'tiny_int_max' => env('TINY_INT_MAX', 128),
//        'u_tiny_int_max' => env('U_TINY_INT_MAX', 255),
//        'small_int_min' => env('SMALL_INT_MIN', -32768),
//        'small_int_max' => env('SMALL_INT_MAX', 32767),
        'u_small_int_max' => env('U_SMALLINT_MAX', 65535),
//        'medium_int_min' => env('MEDIUM_INT_MIN', -8388608),
//        'medium_int_max' => env('MEDIUM_INT_MAX', 8388607),
//        'u_medium_int_max' => env('U_MEDIUM_INT_MAX', 16777215),
//        'int_min' => env('INT_MIN', -2147483648),
//        'int_max' => env('INT_MAX', 2147483647),
//        'u_int_max' => env('U_INT_MAX', 4294967295),
//        'bigint_min' => env('BIG_INT_MIN', -),
//        'bigint_max' => env('BIG_INT_MAX', 9223372036854775807),
//        'u_bigint_max' => env('U_BIG_INT_MAX', ),
    ],
    "string" => [
        'max_length' => env('STRING_MAX_LENGTH', 255), // Длина строки в СУБД. Используется в правиле валидации 'string_field'
        'comment_max_length' => env('COMMENT_MAX_LENGTH', 2048), // Длина строки в СУБД. Используется в правиле валидации 'comment_field'
    ],
    "timestamp" => [
        'min' => env('TIMESTAMP_MIN', 946684800), // Минимальная дата, которая может быть использована в проекте. Используется в правиле валидации 'timestamp'
        'max' => env('TIMESTAMP_MAX', 2147483647), // Максимальное значение timestamp int. Используется в правиле валидации 'timestamp'
    ],
    "price"=>[
        'amount_max' => env('PRICE_AMOUNT_MAX', 9999999999), // Наибольшая цена
        'amount_min' => env('PRICE_AMOUNT_MIN', 0), // Наименьшая цена
    ],

];
