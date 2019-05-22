<?php

namespace App\Policies;

use App\Models\Card;
use App\Models\User;

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
