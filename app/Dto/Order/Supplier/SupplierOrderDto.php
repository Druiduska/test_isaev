<?php

namespace App\Dto\Order\Supplier;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 * Заказ поставщику
 */
class SupplierOrderDto
{
    use ToArrayTrait;

    /**
     * @param string $uuid_1c
     * @param string|null $number_1c
     * @param string|null $owner_uuid_1c
     * @param string|null $owner_department_uuid_1c
     * @param string|null $creator_uuid_1c
     * @param string|null $client_order_uuid_1c
     * @param string|null $contragent_uuid_1c
     * @param string|null $organization_uuid_1c
     * @param string|null $contract_number_supplier
     * @param Carbon|null $contract_at_supplier
     * @param string|null $contract_name
     * @param string|null $contract_uuid_1c
     * @param string|null $contact_person_uuid_1c
     * @param string|null $contact_person_name
     * @param int|null $status_id
     * @param int|null $cost
     * @param int|null $currency_code
     * @param Carbon|null $currency_rate_at
     * @param int|null $is_price_vat
     * @param string|null $supplier_uuid_1c
     * @param string|null $business_operation_id
     * @param string|null $warehouse_name
     * @param string|null $warehouse_uuid_1c
     * @param string|null $payment_type_uuid_1c
     * @param string|null $payment_document_name
     * @param Carbon|null $created_at_1c
     * @param array|null $positions
     */
    public function __construct(
        public string  $uuid_1c,
        public ?string $number_1c = null,
        public ?string $owner_uuid_1c = null,
        public ?string $owner_department_uuid_1c = null,
        public ?string $creator_uuid_1c = null,
        public ?string $client_order_uuid_1c = null,
        public ?string $contragent_uuid_1c = null,
        public ?string $organization_uuid_1c = null,
        public ?string $contract_number_supplier = null,
        public ?Carbon $contract_at_supplier = null,
        public ?string $contract_name = null,
        public ?string $contract_uuid_1c = null,
        public ?string $contact_person_uuid_1c = null,
        public ?string $contact_person_name = null,
        public ?int    $status_id = null,
        public ?int    $cost = null,
        public ?int    $currency_code = null,
        public ?Carbon $currency_rate_at = null,
        public ?int    $is_price_vat = null,
        public ?string $supplier_uuid_1c = null,
        public ?string $business_operation_id = null,
        public ?string $warehouse_name = null,
        public ?string $warehouse_uuid_1c = null,
        public ?string $payment_type_uuid_1c = null,
        public ?string $payment_document_name = null,
        public ?Carbon $created_at_1c = null,
        public ?array  $positions = null,
    )
    {
    }
}
