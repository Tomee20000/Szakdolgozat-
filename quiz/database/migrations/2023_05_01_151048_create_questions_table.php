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
            $table->id();
            $table->string('name');
            $table->string('question1', 255);
            $table->integer('question1 points');
            $table->string('question2', 255);
            $table->integer('question2 points');
            $table->string('question3', 255);
            $table->integer('question3 points');
            $table->string('question4', 255);
            $table->text('question4 text')->nullable();
            $table->string('question5', 255);
            $table->text('question5 text')->nullable();
            $table->boolean('done')->default(false);
            $table->integer('sum')->default(0);
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
