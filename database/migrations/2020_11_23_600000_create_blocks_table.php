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
            $table->uuid('uuid')->unique();
            $table->string('title');
            $table->string('component');
            
            // Relations
            $table->foreignId('property_id');
            // TODO: Setup block categories
            // $table->foreignId('category_id')->nullable();
            $table->foreignId('layout_id')->nullable();
            
            // Ordering
            $table->integer('order')->nullable();
            
            // Content
            $table->json('data')->nullable();
            
            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index(['property_id', 'layout_id']);

            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties');
            // $table->foreign('category_id')->references('id')->on('categories');
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
