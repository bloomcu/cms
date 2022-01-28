<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorizablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorizables', function (Blueprint $table) {
            // $table->integer('category_id')->unsigned();
            $table->foreignId('category_id');
            $table->morphs('categorizable');
            
            // Timestamps
            $table->timestamps();
                
            // Indexes
            $table->unique(['category_id', 'categorizable_id', 'categorizable_type'], 'categorizables_ids_type_unique');
            
            // Foreign constraints
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorizables');
    }
}
