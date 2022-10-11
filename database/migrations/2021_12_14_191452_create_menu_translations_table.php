<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('menu_id')->nullable();
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->longText('text')->nullable();

            $table->unique(['menu_id', 'locale']);
            $table->unique(['locale', 'slug']);

            $table->foreign('menu_id')
                ->references('id')
                ->on('menus')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_translations');
    }
}
