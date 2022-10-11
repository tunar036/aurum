<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSessionsTable extends Migration
{
    public function up()
    {
        Schema::table('sessions', function (Blueprint $table)
        {
            $table->longText('payload')->change();
        });
    }

    public function down()
    {}
}
