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
            $table->boolean('is_blueprint')->default(0);

            // Foreign Relationships
            $table->foreignId('organization_id');
            $table->foreignId('framework_id')->nullable();
            $table->foreignId('wiki_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('type_id')->nullable();

            $table->timestamps();

            // Foreign constraints
            // $table->foreign('organization_id')->references('id')->on('organizations');
            // $table->foreign('blueprint_id')->references('id')->on('pages');
            // $table->foreign('layout_id')->references('id')->on('layouts');
            // $table->string('framework_id')->references('id')->on('frameworks');
            // $table->string('wiki_id')->references('id')->on('wikis');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->foreign('type_id')->references('id')->on('categories');
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
