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
            $table->foreignId('post_id');

            // Draftable
            $table->foreignId('draft_id')->nullable();
            $table->timestamp('drafted_at')->useCurrent()->nullable();

            // Revision
            // $table->foreignId('revised_id')->nullable();
            // $table->timestamp('revised_at')->nullable();

            $table->timestamps();
            
            // Indexes
            $table->index(['post_id']);

            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
