<?php

namespace App\Enums;

enum ModelActionEnum: int
{
    case  CREATE = 0b1;
    case  UPDATE = 0b10;
    case  DELETE = 0b100;
}
