<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacancyTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('vacancy_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('vacancy_id');

            $table->string('name', 255)->nullable();
            $table->string('locale', 2);

            $table->longText('text')->nullable();


            $table->unique(['vacancy_id', 'locale']);

            $table->foreign('vacancy_id')
                ->references('id')
                ->on('vacancies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('vacancy_translations');
    }
}