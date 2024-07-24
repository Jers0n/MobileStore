<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Other global middleware...
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware for web routes...
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Middleware for API routes...
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        // Define your custom middleware group(s) here...
        'custom_group' => [
            // Add your middleware here...
            \App\Http\Middleware\CustomMiddleware::class,
        ],
    ];

    /**
     * The application's route middleware also known as middleware aliases.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $middlewareAliases = [
        'auth.admin' => \App\Http\Middleware\AuthAdmin::class,
        'auth.manager' => \App\Http\Middleware\AuthManager::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \App\Http\Middleware\AuthenticatedWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\View\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'custom_middleware' => \App\Http\Middleware\CustomMiddleware::class,
    ];
}