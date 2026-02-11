<?php

namespace App\Dto\Factory\Lookup\JobPosition;

use App\Dto\Lookup\JobPosition\JobPositionDto;

class JobPositionDtoArrayFactory
{
    /**
     * Создает массив DTO из массива данных.
     *
     * @param array $data Массив данных.
     * @return array<JobPositionDto> Массив DTO.
     */
    public function __invoke(array $data): array
    {
        return array_map(function ($item) {
            return app(JobPositionDtoFromArray::class)($item);
        }, $data);
    }
}
