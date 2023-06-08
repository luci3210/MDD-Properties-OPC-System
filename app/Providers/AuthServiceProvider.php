<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
// use Illuminate\Auth\EmailVerificationRequest;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        //CLIENT_1=qrCPUaFmglFsZxUk11k6rRGEXFRY4LtYHcw44FHd
        //CLIENT_2=3Q5S0wpAhaF6GBmQagAFLzBU6j4vcB573j3WE1wD
    }
}
