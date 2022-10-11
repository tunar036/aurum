<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('company_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->text('description')->nullable();

            $table->unique(['company_id', 'locale']);
            $table->unique(['locale', 'slug']);

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_translations');
    }
}