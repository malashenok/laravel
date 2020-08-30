<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        //factory(User::class, 15)->create();
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'isAdmin' => true
            ],
            [
                'name' => 'user',
                'email' => 'user@user.ru',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'isAdmin' => true

            ],
        ];

        for ($i = 1; $i <= 5; $i++) {

            $users[] = [
                'name' => "user{$i}",
                'email' => "user{$i}@user{$i}.ru",
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'remember_token' => Str::random(10),
                'isAdmin' => false

            ];
        }

        DB::table('users')->insert($users);
    }
}
