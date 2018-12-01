<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->uuid('uid');
            $table->integer('process_id')->unsigned();
            $table->string('name', 40)->nullable();
            $table->string('phone', 20);
            $table->smallInteger('months')->nullable();
            $table->boolean('sterilized')->default(false);
            $table->boolean('vaccinated')->default(false);
            $table->string('sex', 1);
            $table->string('description')->nullable();
            $table->string('city');
            $table->string('longitude');
            $table->string('latitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
