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

