<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quizz_id')->constrained()->cascadeOnDelete();
            $table->string('question')->default('0')->nullable();
            $table->string('a')->default('0')->nullable();
            $table->string('b')->default('0')->nullable();
            $table->string('c')->default('0')->nullable();
            $table->string('d')->default('0')->nullable();
            $table->string('correct')->default('0')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
