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
            $table->uuid('uid')->primary();
            $table->uuid('user_uid');
            $table->integer('category_id')->unsigned();
            $table->string('name', 60);
            $table->string('image', 14)->nullable();
            $table->string('description')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('location')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('latitude')->default(0);
            $table->string('longitude')->default(0);
            $table->integer('views')->default(0);
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
