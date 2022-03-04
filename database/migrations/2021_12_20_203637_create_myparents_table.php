<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyparentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myparents', function (Blueprint $table) {
            $table->id();
            $table->string('name_father');
            $table->string('id_card_father');
            $table->string('father_job');
            $table->string('father_address');
            $table->string('father_phone');
            $table->string('email');
            $table->string('password');
            $table->string('name_mother');
            $table->string('id_card_mother');
            $table->string('mother_job');
            $table->string('mother_address');
            $table->string('mother_phone');
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
        Schema::dropIfExists('myparents');
    }
}
