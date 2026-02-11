<?php

namespace App\Models\Settings;

use App\Models\Defaults\DefaultModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

/**
 * Настройки логирования
 *
 * @property int $id
 * @property int $method_flag флаг метода (описан в App\Enums\HttpMethodEnum)
 * @property ?array statuses
 * @property string $comment
 * @property string $chanel
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class LogSettings extends DefaultModel
{
    use HasFactory;

    protected $table = "log_settings";
    protected $guarded = false;

    protected $fillable = [
        'route',
        'method_flag',
        'statuses',
        'chanel',
        'comment',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'statuses' => 'array',
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}
