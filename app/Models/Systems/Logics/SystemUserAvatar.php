<?php

namespace App\Models\Systems\Logics;

use App\Models\Systems\SystemUserPublicAvatar;
use Illuminate\Support\Arr;

trait SystemUserAvatar
{
    /**
     * Generate random avatars for users.
     * @return integer
     */
    public function avatarRandom(): int
    {
        $systemAvatars = SystemUserPublicAvatar::pluck('id')->toArray();
        return Arr::random($systemAvatars);
    }
}
