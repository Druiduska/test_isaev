<?php

namespace App\Dto\Factory\User;

use App\Dto\User\KeycloakUserDto;

/**
 *  Пользователи Keycloak
 */
class KeycloakUserDtoFromArray
{
    /**
     * @param array $data
     * @return \App\Dto\User\KeycloakUserDto
     */
    public function __invoke(array $data): KeycloakUserDto
    {
        return new KeycloakUserDto(
            sid: $data['sid'] ?? null,
            name: $data['name'] ?? null,
            preferred_username: $data['preferred_username'] ?? null,
            given_name: $data['given_name'] ?? null,
            family_name: $data['family_name'] ?? null,
            email: $data['email'] ?? null,
            amo_id: $data['amo_id'] ?? null,
        );
    }
}
