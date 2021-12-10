<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('component');
            $table->string('type')->nullable();
            $table->string('category_id')->nullable();
            $table->foreignId('layout_id')->nullable();
            $table->integer('order')->nullable();
            $table->json('data')->nullable();
            $table->timestamps();

            // Foreign constraints
            $table->foreign('layout_id')->references('id')->on('layouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocks');
    }
}
