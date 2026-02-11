<?php

namespace App\Dto\Factory\Employee\Salary\JobPositionSalaryRate;

use App\Dto\Employee\Salary\JobPositionSalaryRate\JobPositionSalaryRateDto;
use Illuminate\Support\Facades\Log;

/**
 * Создание объекта JobPositionSalaryRateDto из массива данных.
 */
class JobPositionSalaryRateDtoFromArray
{
    /**
     * Преобразует массив данных в объект JobPositionSalaryRateDto.
     *
     * @param array $data Массив с данными по зарплатной ставке.
     *
     * @return JobPositionSalaryRateDto Объект JobPositionSalaryRateDto
     */
    public function __invoke(array $data): JobPositionSalaryRateDto
    {
        return new JobPositionSalaryRateDto(
            job_position_uuid_1c: $data['job_position_uuid_1c'],
            base_salary: $data['base_salary'],
            regular_bonus: $data['regular_bonus'],
            valid_from_at: timestampToCarbon($data['valid_from_at']),
            valid_to_at: timestampToCarbon($data['valid_to_at']) ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }
}
