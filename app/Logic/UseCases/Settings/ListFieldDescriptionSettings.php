<?php

namespace App\Logic\UseCases\Settings;

use  App\Models\Settings\FieldDescriptionSettings;

class ListFieldDescriptionSettings
{
    /**
     *  Если список сущностей для фильтрации пустой выводятся записи только для общих сущностей
     *
     * @param array $entities Список сущностей для фильтрации
     * @return mixed
     */
    public function __invoke(array $entities = [])
    {
        $entitiesFilter = array_filter(array_merge($entities, [config('settings.field_descriptions.share_entity')]));

        return FieldDescriptionSettings::whereIn('entity_slug', $entitiesFilter)->orderBy('entity_slug');
    }

}
