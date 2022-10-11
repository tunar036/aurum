<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('faq_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('faq_id');
            $table->string('question', 100)->nullable();
            $table->text('answer')->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['faq_id', 'locale']);
            $table->foreign('faq_id')->references('id')->on('faqs')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_translations');
    }
}
