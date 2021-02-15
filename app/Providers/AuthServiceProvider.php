<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Restaurant' => 'App\Policies\RestaurantPolicy',
        'App\Models\Order' => 'App\Policies\OrderPolicy',
        'App\Models\Category' => 'App\Policies\CategoryPolicy',
        'App\Models\Deliveryman' => 'App\Policies\DeliverymanPolicy',
        'App\Models\Dish' => 'App\Policies\DishPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
