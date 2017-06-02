<?php

namespace App\Policies;
use App\User;
use App\Restaurant;

use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function destroy(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->user_id;
    }

    public function user_restaurant(User $user, Restaurant $restaurant)
    {
        return $user->id === $restaurant->user_id;
    }
}
