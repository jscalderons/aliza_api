<?php

use \App\Minisite;
use \App\Category;
use Illuminate\Support\Str;
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
        $okapia = new Minisite();

        $okapia->uid = Str::uuid();
        $okapia->user_id = 2;
        $okapia->category_id = 1;
        $okapia->name = 'OkapiaSoft';
        $okapia->image = 'okapiasoft.png';
        $okapia->description = 'Nos encargamos de la gestión tecnológica para que usted se encargue de lo más importante, hacer crecer su negocio.';
        $okapia->phone = '573022095243';
        $okapia->city = 'Cali';
        $okapia->address = 'Cl. Falsa 123, Springfield';
        $okapia->longitude = '3.3950619';
        $okapia->latitude = '-76.5957046';
        $okapia->views = 1002;

        $okapia->save();

        $category = new Category();
        $category->name = 'Veterinaria';
        $category->save();

    }
}
