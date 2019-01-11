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
        User::create([
            'uid' => '8b9f96d1-743b-462c-95da-87441126f426',
            'name' => 'admin',
            'email' => 'admin@aliza.com',
            'password' => Hash::make('Aliza2019'),
            'remember_token' => str_random(10),
            'api_token' => str_random(60)
        ]);
    }
}
