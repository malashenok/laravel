<?php

namespace App\Repositories;
use App\User;

use Laravel\Socialite\Two\User as UserOAuth;

class UserRepository
{
    public function getUserBySocId(UserOAuth $user, string $socName) {

        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if (is_null($userInSystem)) {

            $userInSystem = new User();
            $userInSystem->fill([
                'name' => !empty($user->getName()) ? $user->getName() : $user->getNickname() ?? '',
                'email' => $user->email ?? $user->getNickname() . '@user.ru',
                'password' => '',
                'id_in_soc' => !empty($user->getId())? $user->getId(): '',
                'type_auth' => $socName,
                'avatar' => !empty($user->getAvatar())? $user->getAvatar(): ''
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
