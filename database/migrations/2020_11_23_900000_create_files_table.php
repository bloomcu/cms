<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('src');
            $table->unsignedBigInteger('size');
            
            // Relations
            $table->foreignId('property_id');
            $table->foreignId('user_id');
            
            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('user_id')->references('id')->on('users');
            
            // Timestamps
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
        Schema::dropIfExists('files');
    }
}
