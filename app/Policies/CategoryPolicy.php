<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;

class CategoryPolicy extends Policy
{
    public function update(User $user, Category $category)
    {
        // return $category->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Category $category)
    {
        return true;
    }
}
