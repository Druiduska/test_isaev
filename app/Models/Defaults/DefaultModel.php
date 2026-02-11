<?php

namespace App\Models\Defaults;

use App\Traits\Model\ModelTableTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Абстрактный класс модели по умолчанию
 */
abstract class DefaultModel extends Model
{
    use ModelTableTrait;
}
