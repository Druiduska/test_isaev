<?php

namespace App\Dto\Factory\Order\Client;

use App\Enums\Order\ClientOrder\ClientOrderPaymentTimeEnum;
use App\Dto\Order\Client\ClientOrderDto;
use App\Enums\Order\ClientOrder\ClientOrderDeliveryStatusEnum;
use App\Enums\Order\ClientOrder\ClientOrderDeliveryTypeEnum;
use App\Enums\Order\ClientOrder\ClientOrderPaymentTypeEnum;
use App\Enums\Order\ClientOrder\ClientOrderStatusEnum;

/**
 * DTO Заказ клиента из массива
 */
class ClientOrderDtoFrom1cArray
{
    /**
     * DTO Заказ клиента из массива
     *
     * @param array $data Массив входящих данных
     * @return ClientOrderDto
     */
    public function __invoke(array $data): ClientOrderDto
    {

        $prepayment_time_id = isset($data['prepayment_time_slugs'])
            ? array_reduce(
                $data['prepayment_time_slugs'],
                fn($carry, $item) => $carry | ClientOrderPaymentTimeEnum::{$item}?->value,
                0
            )
            :null;

        return new ClientOrderDto(
            uuid_1c: $data['uuid_1c'],
            number_1c: $data['number_1c'] ?? null,
            lead_amo_id: $data['lead_amo_id'] ?? null,
            payment_type_id: $this->paymentTypeSlugToId($data['payment_type'] ?? null),
            cost: $data['cost'] ?? null,
            total_amount_supplier_adjustment: $data['total_amount_supplier_adjustment'] ?? null,
            total_amount_supplier_adjustment_comment: $data['total_amount_supplier_adjustment_comment'] ?? null,
            currency_code: $data['currency_code'] ?? null,
            currency_rate_at: timestampToCarbon($data['currency_rate_at'])?->startOfDay(),
            employee_uuid_1c: $data['manager_uuid_1c'] ?? null,
            employee_name: $data['manager_name'] ?? null,
            total_cost_at_client_payment: $data['total_cost_at_client_payment'] ?? null,
            total_cost_at_supplier_billing: $data['total_cost_at_supplier_billing'] ?? null,
            gross_profit_client: $data['gross_profit_client'] ?? null,
            status_id: $this->statusTypeSlugToId($data['status'] ?? null),
            delivery_type_id: $this->deliveryTypeSlugToId($data['delivery_type'] ?? null),
            delivery_status_id: $this->deliveryStatusSlugToId($data['delivery_status'] ?? null),
            delivery_cost: $data['delivery_cost'] ?? null,
            delivery_start_at: timestampToCarbon($data['delivery_start_at']),
            supplier_order_at: timestampToCarbon($data['supplier_order_at']),
            paid_manual_at: timestampToCarbon($data['paid_manual_at']),
            department_uuid_1c: $data['department_uuid_1c'] ?? null,
            category_uuid_1c: $data['category_uuid_1c'] ?? null,
            contragent_uuid_1c: $data['contragent_uuid_1c'] ?? null,
            organization_uuid_1c: $data['organization_uuid_1c'] ?? null,
            department_name: $data['department_name'] ?? null,
            category_name: $data['category_name'] ?? null,
            contragent_name: $data['contragent_name'] ?? null,
            organization_name: $data['organization_name'] ?? null,
            numbers_comment: $data['numbers_comment'] ?? null,
            partner_uuid_1c: $data['partner_uuid_1c'] ?? null,
            agreement_uuid_1c: $data['agreement_uuid_1c'] ?? null,
            agreement_name: $data['agreement_name'] ?? null,
            operation_text: $data['operation_text'] ?? null,
            contract_uuid_1c: $data['contract_uuid_1c'] ?? null,
            contract_name: $data['contract_name'] ?? null,
            warehouse_uuid_1c: $data['warehouse_uuid_1c'] ?? null,
            prepayment_time_id: $prepayment_time_id,
            amount_paid: $data['amount_paid'] ?? null,
            positions: $data['positions'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),
        );
    }

    /**
     * @param string|null $slug
     * @return int|null
     */
    protected function paymentTypeSlugToId(?string $slug): ?int
    {
        return match ($slug) {
            ClientOrderPaymentTypeEnum::CASH->name => ClientOrderPaymentTypeEnum::CASH->value,
            ClientOrderPaymentTypeEnum::BANK->name => ClientOrderPaymentTypeEnum::BANK->value,
            ClientOrderPaymentTypeEnum::ACQUIRING->name => ClientOrderPaymentTypeEnum::ACQUIRING->value,
            ClientOrderPaymentTypeEnum::CREDIT->name => ClientOrderPaymentTypeEnum::CREDIT->value,
            ClientOrderPaymentTypeEnum::CARD->name => ClientOrderPaymentTypeEnum::CARD->value,
            default => null,
        };
    }

    /**
     * @param string|null $slug
     * @return int|null
     */
    protected function deliveryTypeSlugToId(?string $slug): ?int
    {
        return match ($slug) {
            ClientOrderDeliveryTypeEnum::CLIENT->name => ClientOrderDeliveryTypeEnum::CLIENT->value,
            ClientOrderDeliveryTypeEnum::SUPPLIER->name => ClientOrderDeliveryTypeEnum::SUPPLIER->value,
            ClientOrderDeliveryTypeEnum::CLIENT_PICKUP->name => ClientOrderDeliveryTypeEnum::CLIENT_PICKUP->value,
            default => null,
        };
    }

    /**
     * @param string|null $slug
     * @return int|null
     */
    protected function deliveryStatusSlugToId(?string $slug): ?int
    {
        return match ($slug) {
            ClientOrderDeliveryStatusEnum::NOT_SHIPPED->name => 0,  // Не отгружен
            ClientOrderDeliveryStatusEnum::SHIPPED->name => 1, // Отгружено
            ClientOrderDeliveryStatusEnum::DELIVERED->name => 2, // Доставлено
            default => null,
        };
    }

    protected function statusTypeSlugToId(?string $slug): ?int
    {
        return match ($slug) {
            ClientOrderStatusEnum::APPROVAL->name => ClientOrderStatusEnum::APPROVAL->value,
            ClientOrderStatusEnum::EXECUTED->name => ClientOrderStatusEnum::EXECUTED->value,
            ClientOrderStatusEnum::CLOSED->name => ClientOrderStatusEnum::CLOSED->value,
            ClientOrderStatusEnum::DECLINE->name => ClientOrderStatusEnum::DECLINE->value,
            ClientOrderStatusEnum::TAKEN->name => ClientOrderStatusEnum::TAKEN->value,
            ClientOrderStatusEnum::RESOLVED->name => ClientOrderStatusEnum::RESOLVED->value,
            ClientOrderStatusEnum::MODIFY->name => ClientOrderStatusEnum::MODIFY->value,
            default => null,
        };
    }
}
