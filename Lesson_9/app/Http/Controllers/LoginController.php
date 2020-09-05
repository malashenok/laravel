<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request) {

        if (Auth::check()) {
            return redirect()->route('Home');
        }
        return Socialite::with($this->defineSN($request))->redirect();
    }

    public function response(Request $request,UserRepository $userRepository) {

        if (Auth::check()) {
            return redirect()->route('Home');
        }

        $user = Socialite::driver($this->defineSN($request))->user();

        $userInSystem = $userRepository->getUserBySocId($user, $this->defineSN($request));
        Auth::login($userInSystem);
        return redirect()->route('Home');
    }

    /**
     * Define social network
     * @param Request $request
     * @return string
     */
    private function defineSN(Request $request) {
        $sn = '';

        if ($request->is('auth/vk*')) {
            $sn = 'vkontakte';
        } elseif ($request->is('auth/git*')) {
            $sn = 'github';
        }
        return $sn;
    }
}
