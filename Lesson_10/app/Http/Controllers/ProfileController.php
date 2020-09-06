<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function update(Request $request)
    {

        $user = Auth::user();
        $errors = [];

        if ($request->isMethod('post')) {

            $rules = User::rules();
            $rules['email'] = 'required|email';
            unset($rules['name']);

            $this->validate($request, $rules, [], User::attrNames());

            if (Hash::check($request->post('password'), $user->password)) {

                $user->fill([
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword'))
                ]);

                if ($user->save()) {
                    return redirect()->route('Home')->with('success', 'Данные были изменены.');
                } else {
                    return redirect()->route('profile')->with('error', 'Ошибка изменения.');
                }

            } else {

                $errors['password'][] = 'Некорректный текущий пароль.';
                return redirect()->route('profile')->withErrors($errors);
            }
        }

        return view('profile', [
            'user' => $user
        ]) ;
    }
}
