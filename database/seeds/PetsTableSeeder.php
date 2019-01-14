<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Process::create([
            'name' => 'Extraviado'
        ]);

        \App\Process::create([
            'name' => 'Adopción'
        ]);

        App\Pet::truncate();

        factory('App\ImagesPet', 15)->create();
    }
}
