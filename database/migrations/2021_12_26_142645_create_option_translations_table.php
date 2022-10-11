<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('option_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('option_id');
            $table->string('name', 255);
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['option_id', 'locale']);
            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('option_translations');
    }
}
