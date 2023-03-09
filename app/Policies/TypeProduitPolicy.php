<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TypeProduit;
use Illuminate\Auth\Access\HandlesAuthorization;

class TypeProduitPolicy
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
        if(in_array($user->type, ['Gerant', 'Magazinier'])){
            return true;
        }
        else if(in_array($user->type, ['Vendeur'])){
            return false;
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TypeProduit $TypeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magazinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
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
        if(in_array($user->type, ['Gerant', 'Magazinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TypeProduit $TypeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magazinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TypeProduit $TypeProduit)
    {
        if(in_array($user->type, ['Gerant', 'Magazinier'])){
            return true;
        }
        else if (in_array($user->type, ['Vendeur'])){
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TypeProduit $TypeProduit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\productType  $productType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TypeProduit $TypeProduit)
    {
        //
    }
}
