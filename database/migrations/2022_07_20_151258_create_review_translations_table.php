<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('review_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('review_id');
            $table->string('locale', 2);
            $table->string('name', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->text('description')->nullable();

            $table->unique(['review_id', 'locale']);

            $table->foreign('review_id')
                ->references('id')
                ->on('reviews')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_translations');
    }
}