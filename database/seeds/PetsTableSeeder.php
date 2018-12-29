<?php

use \App\Pet;
use \App\Process;
use \App\ImagesPet;
use Illuminate\Support\Str;
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
        // Procesos
        $adoption = new Process();
        $adoption->name = 'Adopción';
        $adoption->save();

        $lost = new Process();
        $lost->name = 'Extraviado';
        $lost->save();

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
