<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->is_admin;
    }

    public function delete(User $user, Post $post)
    {
        return $user->is_admin;
    }
}
