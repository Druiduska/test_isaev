<?php

namespace App\Enums\ResponseSlug;

enum ResponseServerErrorSlugEnum: string
{
    case INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';
    case BAD_GATEWAY = 'BAD_GATEWAY';
    case SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';
}


