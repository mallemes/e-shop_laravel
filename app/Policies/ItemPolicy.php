<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }


    public function create(User $user)
    {
        return $user->role->name != 'user';
    }


    public function update(User $user, Item $item)
    {
        //
    }


    public function delete(User $user, Item $item)
    {
        return ($user->role->name != 'user');
    }
    public function buy(User $user)
    {
        return ($user->role->name == 'user');
    }



}
