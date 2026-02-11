<?php

namespace App\Dto\Factory\Payment\ExpenditureRequest;

use App\Dto\Payment\ExpenditureRequest\ExpenditureRequestDto;
use App\Enums\Payment\CurrencyEnum;

/**
 * Заявка на расходование средств из массива
 */
class ExpenditureRequestDtoFromArray
{
    /**
     * @param array $data
     * @return ExpenditureRequestDto
     */
    public function __invoke(array $data): ExpenditureRequestDto
    {
        return new ExpenditureRequestDto(
            uuid_1c: $data['uuid_1c'],
            number_1c: $data['number_1c'] ?? null,
            supplier_order_uuid_1c: $data['supplier_order_uuid_1c'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
            organization_uuid_1c: $data['organization_uuid_1c'] ?? null,
            department_uuid_1c: $data['department_uuid_1c'] ?? null,
            supplicant_uuid_1c: $data['supplicant_uuid_1c'] ?? null,
            supplicant_name: $data['supplicant_name'] ?? null,
            contragent_uuid_1c: $data['contragent_uuid_1c'] ?? null,
            contragent_bank_uuid_1c: $data['contragent_bank_uuid_1c'] ?? null,
            contragent_bank_account: $data['contragent_bank_account'] ?? null,
            amount: $data['amount'] ?? null,
            currency_code: $data['currency_code'] ?? null,
            currency_rate_at: timestampToCarbon($data['currency_rate_at'])?->startOfDay(),
            payment_before_at: timestampToCarbon($data['payment_before_at']),
            settlement_type_id: $data['settlement_type_id'] ?? null,
            payment_type_uuid_1c: $data['payment_type_uuid_1c'] ?? null,
            payment_type_name: $data['payment_type_name'] ?? null,
            payment_method_id: $data['payment_method_id'] ?? null,
            payment_purpose_comment: $data['payment_purpose_comment'] ?? null,
            transaction_comment: $data['transaction_comment'] ?? null,
            item_supplier_order_uuid_1c: $data['item_supplier_order_uuid_1c'] ?? null,
            item_contract_uuid_1c: $data['item_contract_uuid_1c'] ?? null,
            item_contract_name: $data['item_contract_name'] ?? null,
            item_supplier_uuid_1c: $data['item_supplier_uuid_1c'] ?? null,
            item_settlement_amount: $data['item_settlement_amount'] ?? null,
            item_settlement_currency_id: $data['item_settlement_currency_id'] ?? null,
            item_currency_rate: $data['item_settlement_currency_id'] === CurrencyEnum::RUB ? 1 : $data['item_currency_rate'] ?? null,
            item_vat_rate: $data['item_vat_rate'] ?? null,
            item_vat_amount: $data['item_vat_amount'] ?? null,
            item_cash_flow_uuid_1c: $data['item_cash_flow_uuid_1c'] ?? null,
            item_repayment_at:  timestampToCarbon($data['item_repayment_at']),
            item_comment: $data['item_comment'] ?? null,
        );
    }
}
