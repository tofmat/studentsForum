<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('answers', function(Blueprint $table) {
            if (!Schema::hasColumn('answers', 'body')) {
                $table->string('body');
            }
            if (!Schema::hasColumn('answers', 'question_id')) {
                $table->integer('question_id');
            }
            if (!Schema::hasColumn('answers', 'user_id')) {
                $table->integer('user_id');
            }
        });
    }

    public function down()
    {

    }
}
