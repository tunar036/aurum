<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->default('0');
            $table->enum('home',['1','0'])->default('0');
            $table->enum('mega',['1','0'])->default('0');
            $table->enum('status',['1','0'])->default('1');
            $table->unsignedInteger('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
