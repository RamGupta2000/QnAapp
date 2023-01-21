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
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('ans_id');
            $table->text('ans');
            $table->unsignedBigInteger('ans_que_id');
            $table->foreign('ans_que_id')->references('question_id')->on('questions')->onDelete('cascade');
            $table->string('ans_email');
            $table->foreign('ans_email')->references('email')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('answers');
    }
};