<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(10);
        return view('admin.profile.index')->with('users', $users);
    }

    public function update(Request $request, User $user) {

        $errors = [];

        if ($request->isMethod('post')) {

            $rules = User::rules() ;
            $rules['email'] = 'required|email';

            $this->validate($request, $rules, [], User::attrNames());

            if (Hash::check($request->post('password'), $user->password)) {

                $user->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'password' => Hash::make($request->post('newPassword'))
                ]);

                if ($user->save()) {
                    return redirect()->route('admin.profiles.index')->with('success', 'Данные пользователя были изменены.');
                } else {
                    return redirect()->route('admin.profiles.index')->with('error', 'Ошибка изменения пользователя.');
                }
            } else {
                $errors['password'][] = 'Некорректный текущий пароль.';
                return redirect()->route('admin.profiles.edit', $user)->withErrors($errors);
            }
        }
    }

    public function destroy(User $user) {

        if (Auth::user()->id == $user->id) {
            return redirect()->route('admin.profiles.index')->with('error', 'Нельзя удалять самого себя!');
        }

        if ($user->delete()) {
            return redirect()->route('admin.profiles.index')->with('success', 'Пользователь удален.');
        } else {
            return redirect()->route('admin.profiles.index')->with('error', 'Ошибка удаления пользователя.');
        }

    }

    public function edit(User $user) {
        return view('admin.profile.edit', [
            'user' => $user
        ]);
    }

    public function setAdmin(User $user) {

        if (Auth::user()->id == $user->id) {
            return redirect()->route('admin.profiles.index')->with('error', 'Нельзя удалить роль администратора у самого себя!');
        }

        $user->isAdmin = !$user->isAdmin;

        if($user->save()) {
            $action = $user->isAdmin ? 'добавлена' : 'удалена';
            return redirect()->route('admin.profiles.index')->with('success', 'Пользователю ' . $user->name . ' была ' . $action . ' роль администратора.');
        } else {
            return redirect()->route('admin.profiles.index')->with('error', 'Ошибка изменения роли.');
        }
    }
}
