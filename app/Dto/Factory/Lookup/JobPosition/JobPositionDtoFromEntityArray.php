<?php

namespace App\Dto\Factory\Lookup\JobPosition;

use App\Dto\Lookup\JobPosition\JobPositionDto;

/**
 * Должности.
 * Создание объекта JobPositionDto из массива сущности.
 */
class JobPositionDtoFromEntityArray
{
    /**
     * @param array $data
     * @return JobPositionDto|null
     */
    public function __invoke(array $data): ?JobPositionDto
    {
        if (!isset($data['job_position_uuid_1c'])){
            return null;
        }
        return new JobPositionDto(
            uuid_1c: $data['job_position_uuid_1c'],
            name: $data['job_position_name'] ?? null,
        );
    }
}
