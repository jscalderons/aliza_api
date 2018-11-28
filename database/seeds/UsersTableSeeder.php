<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //\App\User::truncate();

        $user = new App\User();

        $user->name = 'admin';
        $user->email = 'admin@aliza.com';
        $user->password = Hash::make('123456');
        $user->remember_token = str_random(10);

        $user->save();
    }
}
