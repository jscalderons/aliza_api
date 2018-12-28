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
            $table->uuid('user_uid');
            $table->integer('process_id')->unsigned();
            $table->string('name', 40)->nullable();
            $table->string('phone', 20)->nullable();
            $table->smallInteger('age')->nullable();
            $table->boolean('sterilized')->default(false);
            $table->boolean('vaccinated')->default(false);
            $table->string('gender', 1);
            $table->string('description')->nullable();
            $table->string('location');
            $table->decimal('longitude', 9, 6)->default(0);
            $table->decimal('latitude', 9, 6)->default(0);
            $table->timestamp('approved_at')->nullable();
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
