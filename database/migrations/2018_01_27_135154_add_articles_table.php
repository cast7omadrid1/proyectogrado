<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*Creación de tabla de articulos*/
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->integer('user_id')->unsigned();//modificador
            $table->integer('category_id')->unsigned();//modificador

            //user_id es clave foranea de id de la tabla usuarios. Si eliminamos un user, eliminaremos sus articulos
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
        Schema::dropIfExists('articles');
    }
}
