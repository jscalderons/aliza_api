<?php

use \App\Pet;
use \App\Process;
use \App\ImagesPet;
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
        // Procesos
        $adoption = new Process();
        $adoption->name = 'Adopción';
        $adoption->save();

        $lost = new Process();
        $lost->name = 'Extraviado';
        $lost->save();

        // Hunter
        $hunter = new Pet();
        $hunter->uid = (string) Str::uuid();
        $hunter->process_id = 2;
        $hunter->name = 'Hunter';
        $hunter->phone = '3022095243';
        $hunter->months = 36;
        $hunter->sterilized = false;
        $hunter->vaccinated = true;
        $hunter->sex = 'M';
        $hunter->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter->city = 'Cali';
        $hunter->longitude = '3.3950619';
        $hunter->latitude = '-76.5957046';
        $hunter->save();

        // Tomasa
        $tomasa = new Pet();
        $tomasa->uid = (string) Str::uuid();
        $tomasa->process_id = 1;
        $tomasa->name = 'Tomasa';
        $tomasa->phone = '3022095243';
        $tomasa->months = 58;
        $tomasa->sterilized = true;
        $tomasa->vaccinated = true;
        $tomasa->sex = 'F';
        $tomasa->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa->city = 'Cali';
        $tomasa->longitude = '3.3950619';
        $tomasa->latitude = '-76.5957046';
        $tomasa->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter->uid;
        $hunterPhoto->url = url('/storage/images/hunter.jpg');
        $hunterPhoto->save();

        // imagenes
        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa->uid;
        $tomasaPhoto->url = url('/storage/images/tomasa.jpg');
        $tomasaPhoto->save();
    }
}
