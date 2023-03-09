<?php

namespace App\Policies;

use App\Models\User;
use App\Models\client;
use Illuminate\Auth\Access\HandlesAuthorization;

class clientPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magazinier'])){
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, client $client)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magazinier'])){
            return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magazinier'])){
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, client $client)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magazinier'])){
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, client $client)
    {
        if(in_array($user->type, ['Gerant', 'Vendeur'])){
            return true;
        }
        else if(in_array($user->type, ['Magazinier'])){
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, client $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\client  $client
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, client $client)
    {
        
    }
}
