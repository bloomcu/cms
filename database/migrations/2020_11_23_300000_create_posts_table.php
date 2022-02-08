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

            // URL
            $table->string('path')->nullable();
            $table->string('slug')->unique();
            $table->string('url')->nullable();

            // Relations
            $table->foreignId('property_id');
            // $table->foreignId('category_id')->nullable();

            // States
            // $table->boolean('is_published')->default(false);
            $table->boolean('is_blueprint')->default(false);
            
            // Meta
            $table->json('meta')->nullable();
            
            // Publishable
            $table->timestamp('published_at')->nullable();
            
            // Timestamps
            $table->timestamps();
            
            // Indexes
            $table->index(['is_blueprint']);

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
