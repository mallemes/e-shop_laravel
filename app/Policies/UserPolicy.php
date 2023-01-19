<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return ($user->role->name == 'admin');
    }


    public function update(User $user, User $model)
    {
        return ($user->id == $model->id);
    }


    public function ban(User $user, User $model)
    {
        return ($user->role->name == 'admin') && ($model->role->name !='admin');
    }
    public function isAdmin(User $user){
        return ($user->role->name == 'admin');
    }


}
