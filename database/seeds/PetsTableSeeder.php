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
        $hunter = new Pet();
        $hunter->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter->user_uid = 2;
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
        $tomasa->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa->user_uid = 2;
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
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        // imagenes
        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa->uid;
        $tomasaPhoto->filename = 'tomasa.jpg';
        $tomasaPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa->uid;
        $tomasaPhoto->filename = 'tomasa_2.jpg';
        $tomasaPhoto->save();


        // hunter2
        $hunter2 = new Pet();
        $hunter2->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter2->user_uid = 2;
        $hunter2->process_id = 2;
        $hunter2->name = 'hunter2';
        $hunter2->phone = '3022095243';
        $hunter2->months = 36;
        $hunter2->sterilized = false;
        $hunter2->vaccinated = true;
        $hunter2->sex = 'M';
        $hunter2->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter2->city = 'Cali';
        $hunter2->longitude = '3.3950619';
        $hunter2->latitude = '-76.5957046';
        $hunter2->save();

        // Tomasa2
        $tomasa2 = new Pet();
        $tomasa2->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa2->user_uid = 2;
        $tomasa2->process_id = 1;
        $tomasa2->name = 'Tomasa2';
        $tomasa2->phone = '3022095243';
        $tomasa2->months = 58;
        $tomasa2->sterilized = true;
        $tomasa2->vaccinated = true;
        $tomasa2->sex = 'F';
        $tomasa2->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa2->city = 'Cali';
        $tomasa2->longitude = '3.3950619';
        $tomasa2->latitude = '-76.5957046';
        $tomasa2->save();

        // hunter3
        $hunter3 = new Pet();
        $hunter3->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter3->user_uid = 2;
        $hunter3->process_id = 2;
        $hunter3->name = 'hunter3';
        $hunter3->phone = '3022095243';
        $hunter3->months = 36;
        $hunter3->sterilized = false;
        $hunter3->vaccinated = true;
        $hunter3->sex = 'M';
        $hunter3->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter3->city = 'Cali';
        $hunter3->longitude = '3.3950619';
        $hunter3->latitude = '-76.5957046';
        $hunter3->save();

        // Tomasa3
        $tomasa3 = new Pet();
        $tomasa3->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa3->user_uid = 2;
        $tomasa3->process_id = 1;
        $tomasa3->name = 'Tomasa3';
        $tomasa3->phone = '3022095243';
        $tomasa3->months = 58;
        $tomasa3->sterilized = true;
        $tomasa3->vaccinated = true;
        $tomasa3->sex = 'F';
        $tomasa3->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa3->city = 'Cali';
        $tomasa3->longitude = '3.3950619';
        $tomasa3->latitude = '-76.5957046';
        $tomasa3->save();

        // hunter4
        $hunter4 = new Pet();
        $hunter4->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter4->user_uid = 2;
        $hunter4->process_id = 2;
        $hunter4->name = 'hunter4';
        $hunter4->phone = '3022095243';
        $hunter4->months = 36;
        $hunter4->sterilized = false;
        $hunter4->vaccinated = true;
        $hunter4->sex = 'M';
        $hunter4->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter4->city = 'Cali';
        $hunter4->longitude = '3.3950619';
        $hunter4->latitude = '-76.5957046';
        $hunter4->save();

        // Tomasa4
        $tomasa4 = new Pet();
        $tomasa4->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa4->user_uid = 2;
        $tomasa4->process_id = 1;
        $tomasa4->name = 'Tomasa4';
        $tomasa4->phone = '3022095243';
        $tomasa4->months = 58;
        $tomasa4->sterilized = true;
        $tomasa4->vaccinated = true;
        $tomasa4->sex = 'F';
        $tomasa4->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa4->city = 'Cali';
        $tomasa4->longitude = '3.3950619';
        $tomasa4->latitude = '-76.5957046';
        $tomasa4->save();


        // hunter5
        $hunter5 = new Pet();
        $hunter5->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter5->user_uid = 2;
        $hunter5->process_id = 2;
        $hunter5->name = 'hunter5';
        $hunter5->phone = '3022095243';
        $hunter5->months = 36;
        $hunter5->sterilized = false;
        $hunter5->vaccinated = true;
        $hunter5->sex = 'M';
        $hunter5->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter5->city = 'Cali';
        $hunter5->longitude = '3.3950619';
        $hunter5->latitude = '-76.5957046';
        $hunter5->save();

        // Tomasa5
        $tomasa5 = new Pet();
        $tomasa5->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa5->user_uid = 2;
        $tomasa5->process_id = 1;
        $tomasa5->name = 'Tomasa5';
        $tomasa5->phone = '3022095243';
        $tomasa5->months = 58;
        $tomasa5->sterilized = true;
        $tomasa5->vaccinated = true;
        $tomasa5->sex = 'F';
        $tomasa5->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa5->city = 'Cali';
        $tomasa5->longitude = '3.3950619';
        $tomasa5->latitude = '-76.5957046';
        $tomasa5->save();


        // hunter6
        $hunter6 = new Pet();
        $hunter6->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter6->user_uid = 2;
        $hunter6->process_id = 2;
        $hunter6->name = 'hunter6';
        $hunter6->phone = '3022095243';
        $hunter6->months = 36;
        $hunter6->sterilized = false;
        $hunter6->vaccinated = true;
        $hunter6->sex = 'M';
        $hunter6->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter6->city = 'Cali';
        $hunter6->longitude = '3.3950619';
        $hunter6->latitude = '-76.5957046';
        $hunter6->save();

        // Tomasa6
        $tomasa6 = new Pet();
        $tomasa6->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa6->user_uid = 2;
        $tomasa6->process_id = 1;
        $tomasa6->name = 'Tomasa6';
        $tomasa6->phone = '3022095243';
        $tomasa6->months = 58;
        $tomasa6->sterilized = true;
        $tomasa6->vaccinated = true;
        $tomasa6->sex = 'F';
        $tomasa6->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa6->city = 'Cali';
        $tomasa6->longitude = '3.3950619';
        $tomasa6->latitude = '-76.5957046';
        $tomasa6->save();

        // hunter7
        $hunter7 = new Pet();
        $hunter7->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter7->user_uid = 2;
        $hunter7->process_id = 2;
        $hunter7->name = 'hunter7';
        $hunter7->phone = '3022095243';
        $hunter7->months = 36;
        $hunter7->sterilized = false;
        $hunter7->vaccinated = true;
        $hunter7->sex = 'M';
        $hunter7->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter7->city = 'Cali';
        $hunter7->longitude = '3.3950619';
        $hunter7->latitude = '-76.5957046';
        $hunter7->save();

        // Tomasa7
        $tomasa7 = new Pet();
        $tomasa7->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa7->user_uid = 2;
        $tomasa7->process_id = 1;
        $tomasa7->name = 'Tomasa7';
        $tomasa7->phone = '3022095243';
        $tomasa7->months = 58;
        $tomasa7->sterilized = true;
        $tomasa7->vaccinated = true;
        $tomasa7->sex = 'F';
        $tomasa7->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa7->city = 'Cali';
        $tomasa7->longitude = '3.3950619';
        $tomasa7->latitude = '-76.5957046';
        $tomasa7->save();

        // hunter8
        $hunter8 = new Pet();
        $hunter8->uid = '8f77b4dc-4239-4fac-9ca0-577de2960506';//(string) Str::uuid();
        $hunter8->user_uid = 2;
        $hunter8->process_id = 2;
        $hunter8->name = 'hunter8';
        $hunter8->phone = '3022095243';
        $hunter8->months = 36;
        $hunter8->sterilized = false;
        $hunter8->vaccinated = true;
        $hunter8->sex = 'M';
        $hunter8->description = 'Es un Pitbul color blanco con un corazon en la nariz, sufre de distintos males pero la dermatitis es su enemigo numero #1.';
        $hunter8->city = 'Cali';
        $hunter8->longitude = '3.3950619';
        $hunter8->latitude = '-76.5957046';
        $hunter8->save();

        // Tomasa8
        $tomasa8 = new Pet();
        $tomasa8->uid = 'c5d610a0-f162-4c60-858c-a4a577032e0c';//(string) Str::uuid();
        $tomasa8->user_uid = 2;
        $tomasa8->process_id = 1;
        $tomasa8->name = 'Tomasa8';
        $tomasa8->phone = '3022095243';
        $tomasa8->months = 58;
        $tomasa8->sterilized = true;
        $tomasa8->vaccinated = true;
        $tomasa8->sex = 'F';
        $tomasa8->description = 'Hermosa gata blanca de solo 5 años de edad.';
        $tomasa8->city = 'Cali';
        $tomasa8->longitude = '3.3950619';
        $tomasa8->latitude = '-76.5957046';
        $tomasa8->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter2->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa2->uid;
        $tomasaPhoto->filename = 'tomasa_2.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter3->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa3->uid;
        $tomasaPhoto->filename = 'tomasa.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter4->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa4->uid;
        $tomasaPhoto->filename = 'tomasa_2.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter5->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa5->uid;
        $tomasaPhoto->filename = 'tomasa.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter6->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa6->uid;
        $tomasaPhoto->filename = 'tomasa_2.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter7->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa7->uid;
        $tomasaPhoto->filename = 'tomasa.jpg';
        $tomasaPhoto->save();

        // imagenes
        $hunterPhoto = new ImagesPet();
        $hunterPhoto->uid = (string) Str::uuid();
        $hunterPhoto->pet_uid = $hunter8->uid;
        $hunterPhoto->filename = 'hunter.jpg';
        $hunterPhoto->save();

        $tomasaPhoto = new ImagesPet();
        $tomasaPhoto->uid = (string) Str::uuid();
        $tomasaPhoto->pet_uid = $tomasa8->uid;
        $tomasaPhoto->filename = 'tomasa_2.jpg';
        $tomasaPhoto->save();
    }
}
