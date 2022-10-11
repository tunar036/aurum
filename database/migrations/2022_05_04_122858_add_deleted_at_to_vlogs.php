<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToVlogs extends Migration
{
    public function up()
    {
        Schema::table('vlogs', function (Blueprint $table)
        {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('vlogs', function (Blueprint $table)
        {});
    }
}
