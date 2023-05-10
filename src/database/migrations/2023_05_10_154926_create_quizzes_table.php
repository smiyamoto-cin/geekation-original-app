<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->bigIncrements('id');// 自動インクリメントされるbiginteger型の主キー
            $table->unsignedBigInteger('title_id')->nullable(false); // unsigned biginteger型のtitle_idカラム
            $table->string('question', 255)->unique()->nullable(false); // 255文字までのuniqueなquestionカラム
            $table->timestamps(); // created_atとupdated_atカラムを作成する

            //外部キー
            $table->foreign('title_id')->references('id')->on('titles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
