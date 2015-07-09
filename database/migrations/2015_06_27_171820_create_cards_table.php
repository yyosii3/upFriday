<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->char('term')->unique();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');
        });

        Schema::create('card_card', function(Blueprint $table){
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('translation_id')->unsigned();
            $table->timestamps();

            $table->foreign('card_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');

            $table->foreign('translation_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');
        });

        Schema::create('card_synonym', function(Blueprint $table){
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('synonym_id')->unsigned();
            $table->timestamps();

            $table->foreign('card_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');

            $table->foreign('synonym_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');
        });

        Schema::create('card_antonym', function(Blueprint $table){
            $table->increments('id');
            $table->integer('card_id')->unsigned();
            $table->integer('antonym_id')->unsigned();
            $table->timestamps();

            $table->foreign('card_id')
                ->references('id')
                ->on('cards')
                ->onDelete('cascade');

            $table->foreign('antonym_id')
                ->references('id')
                ->on('cards')
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
        Schema::DropIfExists('card_antonym');
        Schema::DropIfExists('card_synonym');
        Schema::DropIfExists('card_card');
        Schema::DropIfExists('cards');
    }
}
