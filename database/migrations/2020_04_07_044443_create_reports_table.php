<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('accuser_id')->unsigned();
            $table->bigInteger('accused_id')->unsigned();
            $table->string('ruta');
            $table->string('title');
            $table->string('description');
            $table->boolean('status')->default(false);

            $table->foreign('accuser_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('accused_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
