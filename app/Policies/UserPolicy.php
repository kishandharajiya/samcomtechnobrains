<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $model)
    {
        switch ($user->role) {
            case 'admin':
                return true;
            case 'supplier':
                return $user->role == $model->role && $model->permissions->permission == 'list';
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,Role $model)
    {
        switch ($user->role) {
            case 'admin':
                return true;
            case 'supplier':
                return $user->role == $model->role && $model->permissions->permission == 'create';
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Role $model)
    {
        switch ($user->role) {
            case 'admin':
                return true;
            case 'supplier':
                return $user->role == $model->role && $model->permissions->permission == 'edit';
            default:
                return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        switch ($user->role) {
            case 'admin':
                return true;
            case 'supplier':
                return $user->role == $model->role && $model->permissions->permission == 'delete';
            default:
                return false;
        }
    }
}
