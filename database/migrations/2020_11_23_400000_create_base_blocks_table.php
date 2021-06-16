<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('component');
            $table->string('category_id')->nullable();
            $table->json('content')->nullable();
            $table->timestamps();

            // Foreign constraints
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
        Schema::dropIfExists('base_blocks');
    }
}
