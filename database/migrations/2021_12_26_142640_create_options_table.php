<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('option_group_id')->nullable();
            $table->integer('order');
            $table->enum('status',['1','0'])->default('1');
            $table->timestamps();

            $table->foreign('option_group_id')
                ->references('id')
                ->on('option_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
