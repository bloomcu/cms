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
            $table->string('type');

            // Foreign Relationships
            $table->foreignId('organization_id');
            $table->foreignId('page_id');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('framework_id')->nullable();

            $table->timestamps();

            // Foreign constraints
            // $table->foreign('organization_id')->references('id')->on('organizations');
            // $table->foreign('page_id')->references('id')->on('pages');
            // $table->foreign('category_id')->references('id')->on('categories');
            // $table->string('framework_id')->references('id')->on('frameworks');
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
