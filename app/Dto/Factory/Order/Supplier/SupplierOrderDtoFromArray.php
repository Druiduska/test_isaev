<?php

namespace App\Dto\Factory\Order\Supplier;

use App\Dto\Order\Supplier\SupplierOrderDto;
use App\Enums\Order\SupplierOrder\SupplierOrderBusinessOperationEnum;
use App\Enums\Order\SupplierOrder\SupplierOrderStatusEnum;
use App\Helpers\EnumHelper;

/**
 * DTO Заказ поставщику из массива
 */
class SupplierOrderDtoFromArray
{
    /**
     * DTO Заказ клиента из массива
     *
     * @param array $data Массив входящих данных
     * @return SupplierOrderDto
     */
    public function __invoke(array $data): SupplierOrderDto
    {
        return new SupplierOrderDto(
            uuid_1c: $data['uuid_1c'],
            number_1c: $data['number_1c'] ?? null,
            owner_uuid_1c: $data['owner_uuid_1c'] ?? null,
            owner_department_uuid_1c: $data['owner_department_uuid_1c'] ?? null,
            creator_uuid_1c: $data['creator_uuid_1c'] ?? null,
            client_order_uuid_1c: $data['client_order_uuid_1c'] ?? null,
            contragent_uuid_1c: $data['contragent_uuid_1c'] ?? null,
            organization_uuid_1c: $data['organization_uuid_1c'] ?? null,
            contract_number_supplier: $data['contract_number_supplier'] ?? null,
            contract_at_supplier: timestampToCarbon($data['contract_at_supplier']),
            contract_name: $data['contract_name'] ?? null,
            contract_uuid_1c: $data['contract_uuid_1c'] ?? null,
            contact_person_uuid_1c: $data['contact_person_uuid_1c'] ?? null,
            contact_person_name: $data['contact_person_name'] ?? null,
            status_id: EnumHelper::getEnumValueByName(
                SupplierOrderStatusEnum::class,
                $data['status'] ?? null
            ),
            cost: $data['cost'] ?? null,
            currency_code: $data['currency_code'] ?? null,
            currency_rate_at: timestampToCarbon($data['currency_rate_at'])?->startOfDay(),
            is_price_vat: $data['is_price_vat'] ?? null,
            supplier_uuid_1c: $data['supplier_uuid_1c'] ?? null,
            business_operation_id: EnumHelper::getEnumValueByName(
                SupplierOrderBusinessOperationEnum::class,
                $data['business_operation_text'] ?? null
            ),
            warehouse_name: $data['warehouse_name'] ?? null,
            warehouse_uuid_1c: $data['warehouse_uuid_1c'] ?? null,
            payment_type_uuid_1c: $data['payment_type_uuid_1c'] ?? null,
            payment_document_name: $data['payment_document_name'] ?? null,
            created_at_1c: timestampToCarbon($data['created_at_1c']),

            positions: $data['positions'] ?? null,
        );
    }
}
