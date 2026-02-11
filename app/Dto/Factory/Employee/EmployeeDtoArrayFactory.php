<?php

namespace App\Dto\Factory\Employee;

use App\Dto\Employee\EmployeeDto;

class EmployeeDtoArrayFactory
{
    /**
     * Создает массив DTO из массива данных.
     *
     * @param array $data Массив данных.
     * @return array<EmployeeDto> Массив DTO.
     */
    public function __invoke(array $data): array
    {
        return array_map(function ($item) {
            return app(EmployeeDtoFromArray::class)($item);
        }, $data);
    }
}
