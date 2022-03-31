<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // $table->id();
            $table->bigIncrements('id');
            $table->string('titles', 255);
            $table->string('short_desc', 255);
            $table->string('desc', 255);
            $table->string('image', 255);
            $table->string('date', 255);
            $table->string('category_post_id', 255);
            $table->integer('status');
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
        //
    }
}