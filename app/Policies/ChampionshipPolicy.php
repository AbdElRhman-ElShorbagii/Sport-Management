<?php

namespace App\Policies;

use App\User;
use App\Championship;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChampionshipPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the championship.
     *
     * @param  \App\User  $user
     * @param  \App\Championship  $championship
     * @return mixed
     */
    public function view(User $user, Championship $championship)
    {
        //
    }

    /**
     * Determine whether the user can create championships.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //        
        return true;
    }

    /**
     * Determine whether the user can update the championship.
     *
     * @param  \App\User  $user
     * @param  \App\Championship  $championship
     * @return mixed
     */
    public function update(User $user, Championship $championship)
    {
        //
    }

    /**
     * Determine whether the user can delete the championship.
     *
     * @param  \App\User  $user
     * @param  \App\Championship  $championship
     * @return mixed
     */
    public function delete(User $user, Championship $championship)
    {
        //
    }
}
