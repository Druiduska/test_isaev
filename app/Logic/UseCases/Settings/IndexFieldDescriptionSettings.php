<?php

namespace App\Logic\UseCases\Settings;

use  App\Models\Settings\FieldDescriptionSettings;

class IndexFieldDescriptionSettings
{
    /**
     * Если список сущностей для фильтрации пустой выводятся записи для всех сущностей
     *
     * @param array|null $entities Список сущностей для фильтрации
     * @return mixed
     */
    public function __invoke(array $entities = null, ?string $sort_field = null, int|bool|null $sort_direction = 1)
    {
        $sortField = in_array($sort_field, [
            'id',
            'entity_slug',
            'created_at',
            'updated_at',
        ])
            ? $sort_field
            : 'entity_slug'; // Сортировка по умолчанию

        $sortDirection = !is_string($sort_field) && (is_null($sort_direction) || (bool)$sort_direction)
            ? 'asc'
            : 'desc';

        $model = FieldDescriptionSettings::select('*')
            ->orderBy(
                $sortField,
                $sortDirection
            );

        if (!is_null($entities)) {
            $model->whereIn('entity_slug', $entities);
        }

        return $model;
    }

}
