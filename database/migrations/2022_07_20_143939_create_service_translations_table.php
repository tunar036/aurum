<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('service_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('service_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();

            $table->unique(['service_id', 'locale']);

            $table->foreign('service_id')
                ->references('id')
                ->on('services')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_translations');
    }
}