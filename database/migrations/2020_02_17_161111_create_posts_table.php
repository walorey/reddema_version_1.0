<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->string('category');
            $table->string('title', 50);
            $table->string('description');
            $table->string('zone_id')->unsigned();
            $table->string('animal_type');
            $table->date('date_event');
            $table->foreign('user_id')->references('id')->('users')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->('zones')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
