<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location')->nullable()->unique(); // E.g, header, footer
            $table->string('component')->nullable(); // E.g, navbar, sub-navbar, footer

            // Relations
            $table->foreignId('property_id')->nullable();
            
            // Vendor - kalnoy/nestedset
            $table->nestedSet();

            // Timestamps
            $table->timestamps();

            // Foreign constraints
            $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
