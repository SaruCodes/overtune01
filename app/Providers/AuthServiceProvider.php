<?php

namespace App\Providers;

use App\Models\Disco;
use App\Policies\DiscoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Disco::class => DiscoPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}

