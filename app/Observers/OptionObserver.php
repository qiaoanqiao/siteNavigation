<?php

namespace App\Observers;

use App\Models\Option;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class OptionObserver
{
    public function updating(Option $option)
    {
        $update = array_diff_key($option->getAttributes(),
            $option->getOriginal());
        foreach ($update as $key => $value) {
            $option->offsetUnset($key);
            $option->value = $value;
        }
    }
}
