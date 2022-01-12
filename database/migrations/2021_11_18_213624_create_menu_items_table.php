<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            // Relations
            $table->foreignId('menu_id')->index();

            // Kalnoy Nestedset
            $table->nestedSet();

            // TODO: We don't need these if using nestedset package
            // $table->foreignId('parent_id')->index()->nullable();
            // $table->integer('sort_order');

            // Timestamps
            $table->timestamps();

            // Foreign constraints
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            // $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
