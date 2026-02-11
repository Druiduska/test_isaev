<?php

namespace App\Logic\UseCases\Settings;

use App\Models\Settings\FieldDescriptionSettings;

/**
 * Загрузка описаний полей из CSV файла
 */
class FieldDescriptionFromCsv
{
    /**
     * Предотвращение загрузки слона
     */
    protected const MAX_ROW = 10000;

    /**
     * @param string $fileName
     * @return int|false
     */
    public function __invoke(string $fileName): int|false
    {
        if (!($fp = fopen($fileName, 'r'))) {
            return false;
        }

        if (config('settings.csv.is_head')) { // Используется ли заголовок
            $head = fgetcsv(
                stream: $fp,
                separator: config('settings.csv.separator'),
                enclosure: config('settings.csv.enclosure'),
                escape: config('settings.csv.escape'),
            );
            $fieldsOrder = [];
            foreach (FieldDescriptionToCsv::HEAD as $key => $val) { // Сопоставление полей заголовка полям таблицы
                if (!is_int($fieldsOrder[$key] = array_search($val, $head))) {
                    return false;
                }
            }
        } else {
            $fieldsOrder = array_keys(FieldDescriptionToCsv::HEAD);
        }
        $rowNum = 0;
        for (; $rowNum < static::MAX_ROW && $fp; $rowNum++) {
            if (!$row = fgetcsv(
                stream: $fp,
                separator: config('settings.csv.separator'),
                enclosure: config('settings.csv.enclosure'),
                escape: config('settings.csv.escape'),
            )) break;
            foreach (FieldDescriptionToCsv::HEAD as $key => $val) {
                $mapedRow[$val] = $row[$fieldsOrder[$key]];
            }
            FieldDescriptionSettings::updateOrCreate(
                [
                    'entity_slug' => $mapedRow['entity_slug'],
                    'name' => $mapedRow['name']
                ],
                $mapedRow
            );
        }
        fclose($fp);
        return $rowNum;
    }

}
