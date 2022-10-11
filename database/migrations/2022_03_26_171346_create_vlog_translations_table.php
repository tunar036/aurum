<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlogTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('vlog_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vlog_id');

            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2);

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->longText('text')->nullable();


            $table->unique(['vlog_id', 'locale']);

            $table->foreign('vlog_id')
                ->references('id')
                ->on('vlogs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vlog_translations');
    }
}
