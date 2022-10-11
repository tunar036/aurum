<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('setting_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('setting_id');
            $table->text('content')->nullable();
            $table->string('locale', 2)->index();
            $table->unique(['setting_id', 'locale']);
            $table->foreign('setting_id')->references('id')->on('settings')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('setting_translations');
    }
}
