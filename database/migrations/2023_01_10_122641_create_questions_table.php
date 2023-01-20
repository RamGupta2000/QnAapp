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
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('question_id');
            $table->text('question_title');
            $table->text('question_desc');
            $table->unsignedBigInteger('question_cat_id');
            $table->foreign('question_cat_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('question_user_id');
            $table->foreign('question_user_id')->references('id')->on('users')->onDelete('cascade');
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
};