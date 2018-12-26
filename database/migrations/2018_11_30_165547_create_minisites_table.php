<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minisites', function (Blueprint $table) {
            $table->uuid('uid');
            $table->uuid('user_uid');
            $table->integer('category_id')->unsigned();
            $table->string('name', 60);
            $table->string('image');
            $table->string('description');
            $table->string('phone', 20);
            $table->string('city');
            $table->string('address', 100);
            $table->string('latitude');
            $table->string('longitude');
            $table->integer('views');
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
        Schema::dropIfExists('minisites');
    }
}
