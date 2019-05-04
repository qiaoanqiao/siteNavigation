<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Option;

class OptionPolicy extends Policy
{
    public function update(User $user, Option $option)
    {
        // return $option->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Option $option)
    {
        return true;
    }
}
