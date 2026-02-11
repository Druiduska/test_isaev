<?php

namespace App\Dto\Factory\Lookup\JobPosition;

use App\Dto\Lookup\JobPosition\JobPositionDto;

/**
 * Должности.
 * Создание объекта JobPositionDto из массива данных.
 */
class JobPositionDtoFromArray
{
    /**
     * Преобразует массив данных в объект JobPositionDto.
     *
     * @param array $data Массив с данными по должности.
     * @return JobPositionDto Объект с данными по должности.
     */
    public function __invoke(array $data): JobPositionDto
    {
        return new JobPositionDto(
            uuid_1c: $data['uuid_1c'],
            name: $data['name'] ?? null,
            is_active: $data['is_active'] ?? null,
        );
    }
}
