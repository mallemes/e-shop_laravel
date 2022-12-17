<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->role->name == 'user';
    }

    public function update(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) ||($user->role->name == 'moderator');
    }

    public function delete(User $user, Comment $comment)
    {
        return ($user->id == $comment->user_id) ||($user->role->name == 'moderator');
    }

}
