<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Card;

class CardPolicy extends Policy
{
    public function update(User $user, Card $card)
    {
        // return $card->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Card $card)
    {
        return true;
    }
}
