<?php

require_once 'convert.php';
require_once 'check.php';

/**
 * Вызов метода класса когда неизвестно есть ли этот метод
 *
 * @param $object
 * @param $method
 * @return mixed
 */
function call_method($object, $method):mixed
{
    return method_exists($object, $method) ?  $object->$method() : null;
}
