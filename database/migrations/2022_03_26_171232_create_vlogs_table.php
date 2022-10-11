<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlogsTable extends Migration
{
    public function up()
    {
        Schema::create('vlogs', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('link')->nullable();
            $table->integer('order');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vlogs');
    }
}
