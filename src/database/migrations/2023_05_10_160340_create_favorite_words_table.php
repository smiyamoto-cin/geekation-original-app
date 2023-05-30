<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_words', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->string('favorite_word', 255)->unique()->nullable();
            $table->string('correct_answer', 255)->nullable();
            $table->timestamps();
            //外部キー
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
        Schema::dropIfExists('favorite_words');
    }
}
