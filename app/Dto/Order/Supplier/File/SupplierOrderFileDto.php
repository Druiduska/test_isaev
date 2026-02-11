<?php

namespace App\Dto\Order\Supplier\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;

/**
 * Файл к заказу поставщику
 */
class SupplierOrderFileDto
{
    /**
     * @param string $uuid_1c
     * @param string|null $supplier_orders_uuid_1c
     * @param Carbon|null $created_at_1c
     * @param UploadedFile|null $file
     */
    public function __construct(
        public string        $uuid_1c,
        public ?string       $supplier_orders_uuid_1c = null,
        public ?Carbon       $created_at_1c = null,
        public ?UploadedFile $file = null,
    )
    {
    }
}
