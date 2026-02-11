<?php

namespace App\Dto\Order\Client;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Заказ клиента
 */
class ClientOrderDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $number_1c
     * @param int|null $lead_amo_id
     * @param string|null $payment_type_id
     * @param int|null $cost
     * @param int|null $total_amount_supplier_adjustment
     * @param string|null $total_amount_supplier_adjustment_comment
     * @param int|null $currency_code
     * @param Carbon|null $currency_rate_at
     * @param string|null $employee_uuid_1c
     * @param string|null $employee_name
     * @param int|null $total_cost_at_client_payment
     * @param int|null $total_cost_at_supplier_billing
     * @param int|null $gross_profit_client
     * @param int|null $status_id
     * @param int|null $delivery_type_id
     * @param int|null $delivery_status_id
     * @param int|null $delivery_cost
     * @param Carbon|null $delivery_start_at
     * @param Carbon|null $supplier_order_at
     * @param Carbon|null $paid_manual_at
     * @param string|null $department_uuid_1c
     * @param string|null $category_uuid_1c
     * @param string|null $contragent_uuid_1c
     * @param string|null $organization_uuid_1c
     * @param string|null $department_name
     * @param string|null $category_name
     * @param string|null $contragent_name
     * @param string|null $organization_name
     * @param string|null $numbers_comment
     * @param string|null $partner_uuid_1c
     * @param string|null $agreement_uuid_1c
     * @param string|null $agreement_name
     * @param string|null $operation_text
     * @param string|null $contract_uuid_1c
     * @param string|null $contract_name
     * @param string|null $warehouse_uuid_1c
     * @param int|null $prepayment_time_id
     * @param int|null $amount_paid
     * @param array|null $positions
     * @param Carbon|null $created_at_1c
     */
    public function __construct(
        public string  $uuid_1c,
        public ?string $number_1c = null,
        public ?int    $lead_amo_id = null,
        public ?string $payment_type_id = null,
        public ?int    $cost = null,
        public ?int    $total_amount_supplier_adjustment = null,
        public ?string $total_amount_supplier_adjustment_comment = null,
        public ?int    $currency_code = null,
        public ?Carbon $currency_rate_at = null,
        public ?string $employee_uuid_1c = null,
        public ?string $employee_name = null,
        public ?int    $total_cost_at_client_payment = null,
        public ?int    $total_cost_at_supplier_billing = null,
        public ?int    $gross_profit_client = null,
        public ?int    $status_id = null,
        public ?int    $delivery_type_id = null,
        public ?int    $delivery_status_id = null,
        public ?int    $delivery_cost = null,
        public ?Carbon $delivery_start_at = null,
        public ?Carbon $supplier_order_at = null,
        public ?Carbon $paid_manual_at = null,
        public ?string $department_uuid_1c = null,
        public ?string $category_uuid_1c = null,
        public ?string $contragent_uuid_1c = null,
        public ?string $organization_uuid_1c = null,
        public ?string $department_name = null,
        public ?string $category_name = null,
        public ?string $contragent_name = null,
        public ?string $organization_name = null,
        public ?string $numbers_comment = null,
        public ?string $partner_uuid_1c = null,
        public ?string $agreement_uuid_1c = null,
        public ?string $agreement_name = null,
        public ?string $operation_text = null,
        public ?string $contract_uuid_1c = null,
        public ?string $contract_name = null,
        public ?string $warehouse_uuid_1c = null,
        public ?int    $prepayment_time_id = null,
        public ?int    $amount_paid = null,
        public ?array  $positions = null,
        public ?Carbon $created_at_1c = null,
    )
    {
    }
}
