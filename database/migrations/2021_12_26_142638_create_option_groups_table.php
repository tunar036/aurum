<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('option_groups', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->integer('order');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('option_groups');
    }
}
