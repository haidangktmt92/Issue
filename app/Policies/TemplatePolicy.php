<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    public function destroy(User $user, Template $template){
        return $user->id === $tempate->user_id;
    }
}
