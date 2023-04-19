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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->integer('serial');
            $table->boolean('1')->default(false);
            $table->boolean('2')->default(false);
            $table->boolean('3')->default(false);
            $table->boolean('4')->default(false);
            $table->boolean('5')->default(false);
            $table->boolean('6')->default(false);
            $table->boolean('7')->default(false);
            $table->boolean('8')->default(false);
            $table->boolean('9')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
