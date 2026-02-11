<?php

namespace App\Enums;

enum HttpMethodEnum: int
{
    case  GET = 0b1;
    case  HEAD = 0b10;
    case  POST = 0b100;
    case  PUT = 0b1000;
    case  PATCH = 0b10000;
    case  DELETE = 0b100000;
    case  CONNECT = 0b1000000;
    case  OPTIONS = 0b10000000;
    case  TRACE = 0b100000000;
}
