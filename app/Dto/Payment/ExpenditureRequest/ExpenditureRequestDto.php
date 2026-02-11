<?php

namespace App\Dto\Payment\ExpenditureRequest;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Входящие платежи
 *
 */
class ExpenditureRequestDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $number_1c
     * @param string|null $supplier_order_uuid_1c
     * @param Carbon|null $created_at_1c
     * @param string|null $organization_uuid_1c
     * @param string|null $department_uuid_1c
     * @param string|null $supplicant_uuid_1c
     * @param string|null $supplicant_name
     * @param string|null $contragent_uuid_1c
     * @param string|null $contragent_bank_uuid_1c
     * @param string|null $contragent_bank_account
     * @param int|null $amount
     * @param int|null $currency_code
     * @param Carbon|null $currency_rate_at
     * @param Carbon|null $payment_before_at
     * @param int|null $settlement_type_id
     * @param string|null $payment_type_uuid_1c
     * @param string|null $payment_type_name
     * @param int|null $payment_method_id
     * @param string|null $payment_purpose_comment
     * @param string|null $transaction_comment
     * @param string|null $comment
     * @param string|null $item_supplier_order_uuid_1c
     * @param string|null $item_contract_uuid_1c
     * @param string|null $item_contract_name
     * @param string|null $item_supplier_uuid_1c
     * @param int|null $item_settlement_amount
     * @param int|null $item_settlement_currency_id
     * @param float|null $item_currency_rate
     * @param int|null $item_vat_rate
     * @param int|null $item_vat_amount
     * @param int|null $item_vat_type_id
     * @param string|null $item_cash_flow_uuid_1c
     * @param Carbon|null $item_repayment_at
     * @param string|null $item_comment
     */
    public function __construct(
        public string  $uuid_1c,
        public ?string $number_1c = null,
        public ?string $supplier_order_uuid_1c = null,
        public ?Carbon $created_at_1c = null,
        public ?string $organization_uuid_1c = null,
        public ?string $department_uuid_1c = null,
        public ?string $supplicant_uuid_1c = null,
        public ?string $supplicant_name = null,
        public ?string $contragent_uuid_1c = null,
        public ?string $contragent_bank_uuid_1c = null,
        public ?string $contragent_bank_account = null,
        public ?int    $amount = null,
        public ?int    $currency_code = null,
        public ?Carbon $currency_rate_at = null,
        public ?Carbon $payment_before_at = null,
        public ?int    $settlement_type_id = null,
        public ?string $payment_type_uuid_1c = null,
        public ?string $payment_type_name = null,
        public ?int    $payment_method_id = null,
        public ?string $payment_purpose_comment = null,
        public ?string $transaction_comment = null,
        public ?string $comment = null,
        public ?string $item_supplier_order_uuid_1c = null,
        public ?string $item_contract_uuid_1c = null,
        public ?string $item_contract_name = null,
        public ?string $item_supplier_uuid_1c = null,
        public ?int    $item_settlement_amount = null,
        public ?int    $item_settlement_currency_id = null,
        public ?float  $item_currency_rate = null,
        public ?int    $item_vat_rate = null,
        public ?int    $item_vat_amount = null,
        public ?int    $item_vat_type_id = null,
        public ?string $item_cash_flow_uuid_1c = null,
        public ?Carbon $item_repayment_at = null,
        public ?string $item_comment = null,
    )
    {
    }
}
