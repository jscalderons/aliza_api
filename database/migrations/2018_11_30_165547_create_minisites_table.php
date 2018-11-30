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
            $table->uuid('user_id');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('phone', 15);
            $table->string('city');
            $table->string('address');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->integer('visitors');
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
