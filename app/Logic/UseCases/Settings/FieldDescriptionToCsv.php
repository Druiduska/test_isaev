<?php

namespace App\Logic\UseCases\Settings;

use App\Models\Settings\FieldDescriptionSettings;

/**
 * Выгрузка описаний полей в CSV файл
 */
class FieldDescriptionToCsv
{
    public const HEAD = [
        'entity_slug',
        'name',
        'ru_label',
        'ru_hint',
        'ru_description',
    ];

    /**
     * @param string $fileName
     * @return int|bool
     */
    public function __invoke(string $fileName): int|bool
    {
        if (!($fp = fopen($fileName, 'w'))) {
            return false;
        }
        // Выгрузка заголовка
        if (config('settings.csv.is_head')) {
            if (!fputcsv(
                stream: $fp,
                fields: static::HEAD,
                separator: config('settings.csv.separator'),
                enclosure: config('settings.csv.enclosure'),
                escape: config('settings.csv.escape'),
                eol: config('settings.csv.eol'),
            )) {
                fclose($fp);
                return false;
            }
        }
        $model = FieldDescriptionSettings::orderBy('entity_slug')
            ->orderBy('name')
            ->get();
//        dd($model->toSql());
        // Выгрузка данных
        $rowNum = 0;
        foreach ($model as $item) {
            $row = [];
            foreach (static::HEAD as $fieldName) {
                $row [] = $item->$fieldName;
            }
            if (!fputcsv(
                stream: $fp,
                fields: $row,
                separator: config('settings.csv.separator'),
                enclosure: config('settings.csv.enclosure'),
                escape: config('settings.csv.escape'),
                eol: config('settings.csv.eol'),
            )) {
                fclose($fp);
                return false;
            }
            $rowNum++;
        }
        fclose($fp);
        return $rowNum;
    }
}
