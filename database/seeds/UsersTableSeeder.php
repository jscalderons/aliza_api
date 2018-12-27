<?php

use \App\User;
use Illuminate\Support\Str;
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

        $admin = new User();
        $admin->uid = 'dc77dd74-3129-443e-a6e0-c39a5f93650a';
        $admin->name = 'admin';
        $admin->email = 'admin@aliza.com';
        $admin->password = Hash::make('123456');
        $admin->remember_token = str_random(10);
        $admin->image = "https://api.adorable.io/avatars/170/" . str_random(2);
        $admin->api_token = str_random(60);
        $admin->save();
    }
}
