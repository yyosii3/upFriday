<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->char('term', 50)->unique();
            $table->char('flag');
            $table->timestamps();
        });

        Schema::create('language_language', function(Blueprint $table){
            $table->increments('id');
            $table->integer('language_id')->unsigned();
            $table->integer('related_id')->unsigned();
            $table->timestamps();

            $table->foreign('language_id')
                  ->references('id')
                  ->on('languages')
                  ->onDelete('cascade');

            $table->foreign('related_id')
                  ->references('id')
                  ->on('languages')
                  ->onDelete('cascade');
        });

        Schema::create('language_language_user', function(Blueprint $table){
            $table->increments('id');
            $table->integer('language_language_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('language_language_id')
                  ->references('id')
                  ->on('language_language')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
        Schema::dropIfExists('language_language');
        Schema::dropIfExists('language_language_user');
    }
}
