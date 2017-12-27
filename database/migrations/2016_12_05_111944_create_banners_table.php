<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
           
           $table->string('title')->nullable();
           $table->string('slug')->nullable();
           $table->string('url')->nullable();
           $table->string('image')->nullable();
           
           $table->boolean('is_featured')->default(false);
           $table->boolean('is_published')->default(true);
           $table->integer('listing_order')->nullable();
           $table->string('status')->default('ACTIVE');

           $table->index('slug');

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
        Schema::dropIfExists('banners');
    }
}
