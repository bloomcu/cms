<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('page');
            $table->string('title');

            // Relations
            $table->foreignId('property_id');
            
            // Draft parent
            $table->foreignId('draft_id')->nullable();
            
            // URL
            $table->string('path')->nullable();
            $table->string('slug')->nullable();
            $table->string('url')->nullable();

            // States
            $table->boolean('is_blueprint')->default(false);
            
            // Meta
            $table->json('meta')->nullable();
            
            // Timestamps
            $table->timestamp('drafted_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            
            // Indexes
            // $table->index(['is_blueprint']);

            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties');
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
        Schema::dropIfExists('posts');
    }
}
