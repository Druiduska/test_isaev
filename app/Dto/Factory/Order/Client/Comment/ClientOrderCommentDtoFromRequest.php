<?php

namespace App\Dto\Factory\Order\Client\Comment;

use App\Dto\Order\Client\Comment\ClientOrderCommentDto;
use Illuminate\Support\Str;

/**
 * DTO Заказ клиента из массива
 */
class ClientOrderCommentDtoFromRequest
{
    /**
     * @param array $data
     * @param string|null $clientOrderUuid1c
     * @param string|null $uuid
     * @return \App\Dto\Order\Client\Comment\ClientOrderCommentDto
     */
    public function __invoke(array $data, ?string $clientOrderUuid1c = null, ?string $uuid = null): \App\Dto\Order\Client\Comment\ClientOrderCommentDto
    {
        return new ClientOrderCommentDto(
            uuid: $uuid ?? Str::uuid(),
            client_order_uuid_1c: $clientOrderUuid1c,
            comment: $data['comment'] ?? null,
        );
    }
}
