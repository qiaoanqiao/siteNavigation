<?php

namespace App\Observers;

use App\Models\Card;
use Illuminate\Support\Facades\Cache;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class CardObserver
{
    public function creating(Card $card)
    {

    }

    public function updating(Card $card)
    {
        //
    }
}
