<?php

namespace App\Dto\Factory\Order\Client\Version;

use App\Dto\Order\Client\Version\ClientOrderPositionDto;

class ClientOrderPositionDtoFromPost
{
    /**
     * @param array $data
     * @param string $client_orders_versions_uuid
     * @return ClientOrderPositionDto
     */
    public function __invoke(array $data, string $client_orders_versions_uuid): ClientOrderPositionDto
    {
        $data['client_orders_versions_uuid'] = $client_orders_versions_uuid;
        return app (ClientOrderPositionDtoFromArray::class)($data);
    }
}
