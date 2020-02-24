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
            $table->bigInteger('user_id')->unsigned();
            $table->enum('category', ['Perdida', 'Encuentro', 'Estado crítico', 'Adopción'])->nullable();
            $table->string('title', 50);
            $table->string('description');
            $table->bigInteger('zone_id')->unsigned();
            $table->enum('animal_type', ['Canino', 'Felino', 'Ave', 'Roedor', 'Equino', 'Otro'])->nullable();
            /** hasta que aprenda a cargar una fecha, agregar columna usando comando de migracion $table->date('date_event'); */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
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
