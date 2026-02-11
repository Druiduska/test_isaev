<?php

namespace App\Enums\ResponseSlug;

enum ResponseClientErrorSlugEnum: string
{
    case UNAUTHORIZED = 'UNAUTHORIZED';
    case FORBIDDEN = 'FORBIDDEN';
    case NOT_FOUND = 'NOT_FOUND';
    case CONFLICT = 'CONFLICT';
    case UNPROCESSABLE_ENTITY = 'UNPROCESSABLE_ENTITY';
    case VALIDATION_FAILED = 'VALIDATION_FAILED';
    case TOO_MANY_REQUESTS = 'TOO_MANY_REQUESTS';
}


