<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            // Foreign Relationships
            $table->foreignId('property_id');
            $table->foreignId('page_id');
            // $table->foreignId('category_id')->nullable();

            // Publishable
            $table->foreignId('drafted_id')->nullable();
            $table->timestamp('drafted_at')->nullable();

            // Revision
            // $table->foreignId('revised_id')->nullable();
            // $table->timestamp('revised_at')->nullable();

            $table->timestamps();
            
            // Indexes
            $table->index(['property_id', 'page_id']);

            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('layouts');
    }
}
