<?php

namespace App\Observers;

use App\Models\Option;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OptionObserver
{
    public function creating(Option $option)
    {
        //
    }

    public function updating(Option $option)
    {
//        $update = array_diff_key($option->getAttributes(), $option->getOriginal());
//        foreach($update as $key => $value) {
//            $optionUpdate = $option->newQuery()->where('name', $key)->first();
//
//            if(!empty($optionUpdate)) {
//                $option->offsetUnset($key);
//                $optionUpdate->update(['value' => $value]);
//            }
//
//        }
    }

    public function updated(Option $option)
    {

    }
}
