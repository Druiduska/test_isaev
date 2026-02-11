<?php

namespace App\Models\Settings;

use App\Models\Defaults\DefaultModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Настройки логирования
 *
 * @property int $id
 * @property string $entity_slug
 * @property string $name
 * @property string $ru_label
 * @property string $ru_hint
 * @property string $ru_description
 */
class FieldDescriptionSettings extends DefaultModel
{
    use HasFactory;

    protected $table = "field_description_settings";
    protected $guarded = false;

    protected $fillable = [
        'entity_slug',
        'name',
        'ru_label',
        'ru_hint',
        'ru_description',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];
}
