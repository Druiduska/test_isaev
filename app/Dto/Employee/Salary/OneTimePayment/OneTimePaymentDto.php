<?php

namespace App\Dto\Employee\Salary\OneTimePayment;

use App\Dto\Traits\ToArrayTrait;
use Carbon\Carbon;

/**
 * Единоразовые выплаты сотрудникам к зарплате
 */
class OneTimePaymentDto
{
    use ToArrayTrait;
    /**
     * @param string|null $uuid UUID
     * @param string $employee_uuid_1c UUID 1C сотрудника
     * @param int|null $amount Сумма единоразовой выплаты (в копейках)
     * @param Carbon|null $payment_at Дата начисления единоразовой выплаты
     * @param bool $is_paid Была ли выплата произведена
     * @param Carbon|null $paid_at Дата фактической выплаты
     */
    public function __construct(
        public string $employee_uuid_1c,
        public ?int $amount = null,
        public ?Carbon $payment_at = null,
        public bool $is_paid = false,
        public ?Carbon $paid_at = null,
        public ?string $uuid = null,
    ) {}

}
