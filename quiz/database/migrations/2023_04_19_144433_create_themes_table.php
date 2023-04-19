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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->integer('serial');
            $table->integer('int1');
            $table->integer('int2');
            $table->integer('int3');
            $table->text('text4');
            $table->text('text5');
            $table->boolean('done')->default(false);
            $table->integer('sum')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('themes');
    }
};
