<?php

namespace App\Logic\Singletons;

use App\Dto\Factory\User\KeycloakUserDtoFromArray;
use App\Logic\UseCases\User\SaveKeycloakUser;
use App\Logic\UseCases\Log\ErrorSpecificChannelLog;

/**
 * Информация текущем пользователе
 */
class JwtUser
{
    protected static ?array $payload = null;

    /**
     * Устанавливает payload токена
     *
     * @param array|null $payload
     * @return void
     */
    public function __invoke(?array $payload): void
    {
        self::$payload = $payload;
        try {
            app(SaveKeycloakUser::class)(app(KeycloakUserDtoFromArray::class)($payload));
        } catch (\Throwable $exception) {
            app(ErrorSpecificChannelLog::class)($exception, 'keycloak_user');
        }
    }

    /**
     * Возвращает роли пользователя из payload
     *
     * @return array
     */
    public function getRoles(): array
    {
        return self::$payload['resource_access']['concentrator']['roles'] ?? [];
    }

    /**
     * Возвращает email пользователя из payload
     *
     * @return string
     */
    public function getEmail(): string
    {
        return self::$payload['preferred_username'] ?? '';
    }
    /**
     * Возвращает login пользователя из payload (preferred_username)
     *
     * @return string
     */
    public function getPreferredUsername(): string
    {
        return self::$payload['preferred_username'] ?? '';
    }

    /**
     * Возвращает "Session ID" пользователя
     *
     * @return string
     */
    public function getSid(): string
    {
        return self::$payload['sid'] ?? '';
    }
}
