<?php

namespace App\Dto\Order\Client\Comment;

use App\Dto\Traits\ToArrayTrait;

/**
 * Заказ клиента
 */
class ClientOrderCommentDto
{
    use ToArrayTrait;

    /**
     * @param string|null $uuid
     * @param string|null $client_order_uuid_1c
     * @param string|null $comment
     */
    public function __construct(
        public ?string $uuid,
        public ?string $client_order_uuid_1c,
        public ?string $comment,
    )
    {
    }
}
