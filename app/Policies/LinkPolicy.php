<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Link;

class LinkPolicy extends Policy
{
    public function update(User $user, Link $link)
    {
        // return $link->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Link $link)
    {
        return true;
    }
}
