<?php

namespace App\Policies;

use App\User;
use App\Models\CategoryModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any category models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function before(User $user){
        if($user->role ==1){
            return true;
        }
    }

    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the category model.
     *
     * @param  \App\User  $user
     * @param  \App\CategoryModel  $categoryModel
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->role ==2;
    }

    /**
     * Determine whether the user can create category models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role ==2;
    }

    /**
     * Determine whether the user can update the category model.
     *
     * @param  \App\User  $user
     * @param  \App\CategoryModel  $categoryModel
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role ==2;
    }

    /**
     * Determine whether the user can delete the category model.
     *
     * @param  \App\User  $user
     * @param  \App\CategoryModel  $categoryModel
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role ==2;
    }

    /**
     * Determine whether the user can restore the category model.
     *
     * @param  \App\User  $user
     * @param  \App\CategoryModel  $categoryModel
     * @return mixed
     */
    public function restore(User $user)
    {
        return $user->role ==2;
    }

    /**
     * Determine whether the user can permanently delete the category model.
     *
     * @param  \App\User  $user
     * @param  \App\CategoryModel  $categoryModel
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        return $user->role ==2;
    }
}
