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
        $admin->uid = 1;
        $admin->name = 'admin';
        $admin->email = 'admin@aliza.com';
        $admin->password = Hash::make('123456');
        $admin->remember_token = str_random(10);
        $admin->image = "https://api.adorable.io/avatars/170/" . str_random(2);
        $admin->save();

        $okapia = new User();
        $okapia->uid = 2;
        $okapia->name = 'okapiasoft';
        $okapia->email = 'info@okapiasoft.com';
        $okapia->password = Hash::make('123456');
        $okapia->remember_token = str_random(10);
        $okapia->api_token = 'o36Kbl1tlFJbxvstlvNda7fXNTIg4mDwQEXRiW7FPRK2olep1rElYam3EnOT';
        $okapia->image = "https://api.adorable.io/avatars/170/" . str_random(2);
        $okapia->save();
    }
}
