<?php

namespace App\Policies;

use App\Restaurant;
use App\Table;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class TablePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function destroy(User $user, Table $table)
    {
        return $user ->id === $table->restaurant->user_id;
    }
}
