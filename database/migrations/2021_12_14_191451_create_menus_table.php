<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table)
        {
            $table->increments('id');
            $table->json('positions')->nullable();
            $table->unsignedInteger('parent_id')->default('0');
            $table->enum('status',['1','0'])->default('1');
            $table->unsignedInteger('order')->nullable();

            $table->index(['parent_id', 'status', 'order']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
