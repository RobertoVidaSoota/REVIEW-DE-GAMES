<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videogames', function (Blueprint $table) {
            $table->id();
            $table->string('name_game', 191);
            $table->string('developer', 191);
            $table->string('owner', 191)->nullable();
            $table->string('gender', 191);
            $table->string('year', 191);
            $table->string('version', 191);

            $table->unsignedBigInteger('fk_id_reviews');
            $table->foreign('fk_id_reviews')->references('id')->on('reviews')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('videogames');
    }
};
