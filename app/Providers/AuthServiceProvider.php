<?php

namespace App\Providers;

use App\Restaurant;
use App\Policies\RestaurantPolicy;
use App\Dish;
use App\Table;
use App\Policies\DishPolicy;
use App\Policies\TablePolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Restaurant::class => RestaurantPolicy::class,
        Dish::class => DishPolicy::class,
        Table::class => TablePolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        // 优先使用模型实例对应的policy，再检查gate权限；二者选其一；
        // $gate->define('update-restaurant', function($user, $restaurant){
        //     return $user->id === $restaurant->user_id;
        // });

        // 设置授权方法一：
        // $gate->define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });
        // 设置授权方法二：基于类的权限
        // $gate->define('update-post', 'Class@method');
        // 设置授权方法三：policy
    }
}
