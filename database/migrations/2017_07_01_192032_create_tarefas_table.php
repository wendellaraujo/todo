<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function(Blueprint $table){
            $table->increments('id');
            $table->string('nometarefa');
            $table->date('data');
            $table->text('comentario')->nullable();
            $table->boolean('completa')->default(true);
            $table->timestamps();
            $table->integer('lista_id')->unsigned();
            $table->foreign('lista_id')->references('id')->on('listas') ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
