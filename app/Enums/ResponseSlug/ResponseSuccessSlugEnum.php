<?php

namespace App\Enums\ResponseSlug;

enum ResponseSuccessSlugEnum: string
{
    case SUCCESS = 'SUCCESS';
    case CREATED = 'CREATED';
    case UPDATED = 'UPDATED';
    case DELETED = 'DELETED';
    case LIST = 'LIST';
    case SHOW = 'SHOW';
}


