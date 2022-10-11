<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('feature_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('feature_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();

            $table->unique(['feature_id', 'locale']);

            $table->foreign('feature_id')
                ->references('id')
                ->on('features')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feature_translations');
    }
}