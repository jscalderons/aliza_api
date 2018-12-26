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
        $veterinaria = new Category();
        $veterinaria->name = 'Veterinaria';
        $veterinaria->save();

        $petshop = new Category();
        $petshop->name = 'PetShop';
        $petshop->save();

        // OKAPIASOFT
        $okapia = new Minisite();

        $okapia->uid = Str::uuid();
        $okapia->user_uid = 2;
        $okapia->category_id = $veterinaria->id;
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

        // andimo
        $andimo = new Minisite();

        $andimo->uid = Str::uuid();
        $andimo->user_uid = 2;
        $andimo->category_id = $petshop->id;
        $andimo->name = 'andimo';
        $andimo->image = 'andimo.png';
        $andimo->description = '';
        $andimo->phone = '573022095243';
        $andimo->city = 'Cali';
        $andimo->address = 'Cl. Falsa 123, Springfield';
        $andimo->longitude = '3.3950619';
        $andimo->latitude = '-76.5957046';
        $andimo->views = 1002;

        $andimo->save();

        // osaky
        $osaky = new Minisite();

        $osaky->uid = Str::uuid();
        $osaky->user_uid = 2;
        $osaky->category_id = $veterinaria->id;
        $osaky->name = 'osaky';
        $osaky->image = 'osaky.png';
        $osaky->description = '';
        $osaky->phone = '573022095243';
        $osaky->city = 'Cali';
        $osaky->address = 'Cl. Falsa 123, Springfield';
        $osaky->longitude = '3.3950619';
        $osaky->latitude = '-76.5957046';
        $osaky->views = 1002;

        $osaky->save();

        // aliza
        $aliza = new Minisite();

        $aliza->uid = Str::uuid();
        $aliza->user_uid = 2;
        $aliza->category_id = $petshop->id;
        $aliza->name = 'aliza';
        $aliza->image = 'aliza.png';
        $aliza->description = '';
        $aliza->phone = '573022095243';
        $aliza->city = 'Cali';
        $aliza->address = 'Cl. Falsa 123, Springfield';
        $aliza->longitude = '3.3950619';
        $aliza->latitude = '-76.5957046';
        $aliza->views = 1002;

        $aliza->save();

        // mastotal
        $mastotal = new Minisite();

        $mastotal->uid = Str::uuid();
        $mastotal->user_uid = 2;
        $mastotal->category_id = $veterinaria->id;
        $mastotal->name = 'mastotal';
        $mastotal->image = 'mastotal.png';
        $mastotal->description = '';
        $mastotal->phone = '573022095243';
        $mastotal->city = 'Cali';
        $mastotal->address = 'Cl. Falsa 123, Springfield';
        $mastotal->longitude = '3.3950619';
        $mastotal->latitude = '-76.5957046';
        $mastotal->views = 1002;

        $mastotal->save();
    }
}
