<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCareerTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('career_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('career_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();

            $table->unique(['career_id', 'locale']);

            $table->foreign('career_id')
                ->references('id')
                ->on('careers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('career_translations');
    }
}