<?php

namespace App\Policies;

use App\Restaurant;
use App\Dish;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function destroy(User $user, Dish $dish)
    {
        return $user->id === $dish->restaurant->user_id;
    }
}
