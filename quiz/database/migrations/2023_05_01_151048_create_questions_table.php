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
            $table->integer('question1_points');
            $table->string('question2', 255);
            $table->boolean('question2_1')->default(false);
            $table->boolean('question2_2')->default(false);
            $table->boolean('question2_3')->default(false);
            $table->integer('question2_points');
            $table->string('question3', 255);
            $table->integer('question3_points');
            $table->string('question4', 255);
            $table->text('question4_text')->nullable();
            $table->string('question5', 255);
            $table->text('question5_text')->nullable();
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
