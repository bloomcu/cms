<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            // URL
            $table->string('path')->nullable();
            $table->string('slug')->unique();
            $table->string('url')->nullable();

            // Relations
            $table->foreignId('organization_id');
            $table->foreignId('category_id')->nullable();

            // States
            // $table->boolean('is_published')->default(false)->index();
            $table->boolean('is_blueprint')->default(false)->index();

            $table->timestamps();

            // Foreign constraints
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
