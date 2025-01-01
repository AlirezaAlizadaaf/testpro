<?php

namespace App\Policies;

use App\Models\User;
use App\Models\post;
use Illuminate\Auth\Access\Response;

class postPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function edit(User $user , Post $post): bool
    {
        return $post->user->is($user);
    }


}
