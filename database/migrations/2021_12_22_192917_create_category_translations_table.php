<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('category_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->unique(['category_id', 'locale']);
            $table->unique(['locale', 'slug']);

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_translations');
    }
}
