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
            $table->foreignId('company_id');
            $table->foreignId('layout_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('type_id')->nullable();
            $table->timestamps();

            // Foreign constraints
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('layout_id')->references('id')->on('layouts');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('type_id')->references('id')->on('categories');
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
