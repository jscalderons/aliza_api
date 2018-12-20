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
        $admin->name = 'admin';
        $admin->email = 'admin@aliza.com';
        $admin->password = Hash::make('123456');
        $admin->remember_token = str_random(10);
        $admin->save();

        $okapia = new User();
        $okapia->name = 'okapiasoft';
        $okapia->email = 'info@okapiasoft.com';
        $okapia->password = Hash::make('123456');
        $okapia->remember_token = str_random(10);
        $okapia->save();
    }
}
