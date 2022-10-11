<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTable extends Migration
{
    public function up()
    {
        Schema::create('language', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('name', 20)->unique();
            $table->string('code', 2)->unique();
            $table->boolean('default')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('language');
    }
}
