<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects',function(Blueprint $table){
            $table->increments('id');
            
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('type')->nullable();
            $table->string('client')->nullable();
            $table->text('client_address')->nullable();
            $table->string('project_value')->nullable();
            $table->string('currency')->nullable();
            $table->date('completion_date')->nullable();
            $table->boolean('is_featured')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('google_map_place_id',2000)->nullable();
            $table->integer('listing_order')->default(0);

            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
