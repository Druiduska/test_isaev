<?php

use App\Http\Resources\Api\AbstractResponseResource;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use App\Http\Resources\Api\Errors\NotFoundErrorResource;
use App\Http\Resources\Api\Errors\UnauthorizedErrorResource;
use App\Http\Resources\Api\Errors\InternalServerErrorResource;
use App\Http\Resources\Api\Errors\AbstractErrorResource;
use App\Logic\UseCases\Log\ErrorLog;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Request;
use App\Logic\Singletons\RequestData;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware
            ->group('api', [
//                ReadPayload::class,
//                LogRequestMiddleware::class,
//                LogResponseMiddleware::class
            ])

            ->alias([
//                'auth' => ApiAuthenticate::class,
            ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
//        Integration::handles($exceptions);
        $exceptions
            // Client Error
            ->render(function (AuthenticationException $exception, Request $request) {
                return response()->json(new UnauthorizedErrorResource($request), 401);
            })
            ->render(function (AccessDeniedHttpException $exception, Request $request) {
                return response()->json(new UnauthorizedErrorResource($request), 403);
            })
            ->render(function (NotFoundHttpException $e, Request $request) {
                return response()->json(new NotFoundErrorResource($request), 404);
            })
            // Server Error
            ->render(function (\Throwable $exception, Request $request) {
                app(ErrorLog::class)($exception);
                if (config('app.debug')) {
                    return response()->json(new InternalServerErrorResource($exception), 500);
                }
                return (new InternalServerErrorResource($request, ['Internal server error']))->response()->setStatusCode(500);
            })
        ;
    })
    ->withSingletons([
//        JwtUser::class,
        RequestData::class
    ])
    ->create();
