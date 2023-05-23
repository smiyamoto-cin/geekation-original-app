<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incorrect_answers', function (Blueprint $table) {
            $table->renameColumn('incorrect_answer', 'question');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incorrect_answers', function (Blueprint $table) {
            $table->renameColumn('question', 'incorrect_answer');
        });
    }
}
