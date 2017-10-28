<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;


    public function touchUser(User $user, Profile $profile)
    {
        return $user->id === $profile->user_id;
    }

    public function touchCompany(Company $comapny, Profile $profile)
    {
        return $comapny->id === $profile->company_id;
    }
}
