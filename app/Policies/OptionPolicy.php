<?php

namespace App\Policies;

use App\Models\Option;
use App\Models\User;

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
