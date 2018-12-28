<?php

use \App\Minisite;
use \App\Category;
use Illuminate\Database\Seeder;

class MinisitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $veterinaria = new Category();
        $veterinaria->name = 'Veterinaria';
        $veterinaria->save();

        $petshop = new Category();
        $petshop->name = 'PetShop';
        $petshop->save();

        // OKAPIASOFT
        $okapia = new Minisite();

        $okapia->uid = 'ae15fb49-b346-4334-992f-cac943341660';
        $okapia->user_uid = 2;
        $okapia->category_id = $veterinaria->id;
        $okapia->name = 'OkapiaSoft';
        $okapia->image = 'okapiasoft.png';
        $okapia->description = 'Nos encargamos de la gestión tecnológica para que usted se encargue de lo más importante, hacer crecer su negocio.';
        $okapia->phone = '573022095243';
        $okapia->location = 'Cali';
        $okapia->address = 'Cl. Falsa 123, Springfield';
        $okapia->longitude = '3.3950619';
        $okapia->latitude = '-76.5957046';
        $okapia->views = 1002;

        $okapia->save();
    }
}
