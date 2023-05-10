<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncorrectAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incorrect_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('incorrect_answer', 255)->unique()->nullable(false);
            $table->string('correct_answer', 255)->nullable(false);
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incorrect_answers');
        
    }
}
