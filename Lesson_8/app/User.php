<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function rules() {
        return [
            'name' =>  'required|string|min:5|max:1024',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' =>  'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    public static function attrNames() {
        return [
            'name' => 'Имя пользователя',
            'email' => 'Почтовый адрес',
            'password' => 'Пароль',
            'newPassword' => 'Новый пароль'
        ];
    }
}
