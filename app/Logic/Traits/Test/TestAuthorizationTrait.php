<?php

namespace App\Logic\Traits\Test;

use Illuminate\Routing\Middleware\ThrottleRequests;

trait TestAuthorizationTrait
{
//    use WithFaker;
//    protected $user;

    protected string $authorization;

    protected function testAuthorization()
    {
        $this->withoutMiddleware(
            ThrottleRequests::class
        );

        $this->authorization = 'Bearer ' . env('ACCESS_TOKEN');
    }
}
