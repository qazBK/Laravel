<?php

namespace App\Policies;

use App\Models\User;
use App\Models\car;
use Illuminate\Auth\Access\Response;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, car $car)
    {
        //
        return $user->id == $car->user_id;        
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, car $car)
    {
        //
        return $user->id == $car->user_id;        

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, car $car)
        {
        //
        //return false;
        return $user->id == $car->user_id;        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, car $car)
    {
        //
        return $user->id == $car->user_id;        

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, car $car)
    {
        //
        //return false;
        return $user->id == $car->user_id;        
    }
}