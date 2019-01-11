<?php

use \App\Pet;
use Carbon\Carbon;
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

        Pet::truncate();

        factory(App\Pet::class, 50)->create();
        // for ($i=1; $i < 101; $i++) {
        //     Pet::create([
        //         'uid' => Illuminate\Support\Str::uuid(),
        //         'user_uid' => '8b9f96d1-743b-462c-95da-87441126f426',
        //         'process_id' => rand(0, 1),
        //         'name' => "mascota#{$i}",
        //         'phone' => rand(1000000000, 9999999999),
        //         'age' => rand(1, 100),
        //         'sterilized' => rand(0, 1),
        //         'vaccinated' => rand(0, 1),
        //         'gender' => rand(0, 1) ? 'M' : 'F',
        //         'description' => "Esta es la mascota#{$i}",
        //         'location' => 'Cali',
        //         'approved_at' => now(),
        //         'created_at' => Carbon::now()->subDays(100)->addDays($i)
        //     ]);
        // }


        // Hunter
        // $hunter = new Pet();
        // $hunter->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        // $hunter->user_uid = 'dc77dd74-3129-443e-a6e0-c39a5f93650a';
        // $hunter->process_id = 2;
        // $hunter->name = 'Hunter';
        // $hunter->phone = '3022095243';
        // $hunter->age = 36;
        // $hunter->sterilized = false;
        // $hunter->vaccinated = true;
        // $hunter->gender = 'M';
        // $hunter->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        // $hunter->location = 'Cali';
        // $hunter->longitude = '3.3950619';
        // $hunter->latitude = '-76.5957046';
        // $hunter->save();

        // // Tomasa
        // $tomasa = new Pet();
        // $tomasa->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        // $tomasa->user_uid = 'dc77dd74-3129-443e-a6e0-c39a5f93650a';
        // $tomasa->process_id = 1;
        // $tomasa->name = 'Tomasa';
        // $tomasa->phone = '3022095243';
        // $tomasa->age = 58;
        // $tomasa->sterilized = true;
        // $tomasa->vaccinated = true;
        // $tomasa->gender = 'F';
        // $tomasa->description = 'Hermosa gata blanca de solo 5 años de edad.';
        // $tomasa->location = 'Cali';
        // $tomasa->longitude = '3.3950619';
        // $tomasa->latitude = '-76.5957046';
        // $tomasa->save();

        // imagenes
        // $hunterPhoto = new ImagesPet();
        // $hunterPhoto->uid = (string) Str::uuid();
        // $hunterPhoto->pet_uid = $hunter->uid;
        // $hunterPhoto->filename = 'hunter.jpg';
        // $hunterPhoto->save();

        // // imagenes
        // $tomasaPhoto = new ImagesPet();
        // $tomasaPhoto->uid = (string) Str::uuid();
        // $tomasaPhoto->pet_uid = $tomasa->uid;
        // $tomasaPhoto->filename = 'tomasa.jpg';
        // $tomasaPhoto->save();

        // $tomasaPhoto = new ImagesPet();
        // $tomasaPhoto->uid = (string) Str::uuid();
        // $tomasaPhoto->pet_uid = $tomasa->uid;
        // $tomasaPhoto->filename = 'tomasa_2.jpg';
        // $tomasaPhoto->save();

    }
}
