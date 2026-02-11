<?php

namespace App\Dto\Factory\Employee\Salary\OneTimePayment;

use App\Dto\Employee\Salary\OneTimePayment\OneTimePaymentDto;

/**
 * Создание объекта OneTimePaymentDto из массива данных.
 * Единоразовые выплаты сотрудникам к зарплате.
 */
class OneTimePaymentDtoFromArray
{
    /**
     * Преобразует массив данных в объект OneTimePaymentDto.
     *
     * @param array $data Массив с данными.
     *
     * @return OneTimePaymentDto Объект OneTimePaymentDto
     */
    public function __invoke(array $data): OneTimePaymentDto
    {
        return new OneTimePaymentDto(
            employee_uuid_1c: $data['employee_uuid_1c'],
            amount: $data['amount'] ?? null,
            payment_at: timestampToCarbon($data['payment_at']) ?? null,
            is_paid: $data['is_paid'] ?? false,
            paid_at: timestampToCarbon($data['paid_at']) ?? null,
            uuid: $data['uuid'] ?? null,
        );
    }
}
