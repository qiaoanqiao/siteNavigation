<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CardReferee;

class CardRefereePolicy extends Policy
{
    public function update(User $user, CardReferee $card_referee)
    {
        // return $card_referee->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, CardReferee $card_referee)
    {
        return true;
    }
}
