<?php

use \App\Pet;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pet = new Pet();

        $pet->uid = (string) Str::uuid();
        $pet->name = 'Hunter';

        $pet->save();
    }
}
