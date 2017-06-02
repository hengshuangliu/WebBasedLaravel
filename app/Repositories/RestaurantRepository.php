<?php
namespace App\Repositories;

use App\User;
use App\Restaurant;

class RestaurantRepository
{
    /**
     * Get all of the Restaurant for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Restaurant::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}