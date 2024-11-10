<?php

namespace App\Policies;

use App\Models\Thoughts;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ThoughtsPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Thoughts $Thought): bool
    {
        return ($user->is_admin || $user->id === $Thought->user_id);

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Thoughts $Thought): bool
    {
        return ($user->is_admin || $user->id === $Thought->user_id);

    }

}
