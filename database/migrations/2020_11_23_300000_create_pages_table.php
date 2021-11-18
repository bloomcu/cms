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

            // Foreign Relationships
            $table->foreignId('organization_id');
            $table->foreignId('category_id')->nullable();

            $table->timestamps();

            // Foreign constraints
            // $table->foreign('organization_id')->references('id')->on('organizations');
            // $table->foreign('blueprint_id')->references('id')->on('pages');
            // $table->foreign('layout_id')->references('id')->on('layouts');
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
        Schema::dropIfExists('pages');
    }
}
