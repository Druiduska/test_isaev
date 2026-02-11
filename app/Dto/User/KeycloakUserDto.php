<?php

namespace App\Dto\User;

use App\Dto\Traits\ToArrayTrait;
use Illuminate\Support\Carbon;

/**
 *  Пользователи Keycloak из массива
 */
class KeycloakUserDto
{
    use ToArrayTrait;

    /**
     * @param string|null $sid
     * @param string|null $name
     * @param string|null $preferred_username
     * @param string|null $given_name
     * @param string|null $family_name
     * @param string|null $email
     * @param string|null $amo_id
     */
    public function __construct(
        public ?string $sid = null,
        public ?string $name = null,
        public ?string $preferred_username = null,
        public ?string $given_name = null,
        public ?string $family_name = null,
        public ?string $email = null,
        public ?string $amo_id = null,
    )
    {
    }
}
