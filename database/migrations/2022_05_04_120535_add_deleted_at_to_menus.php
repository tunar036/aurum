<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToMenus extends Migration
{
    public function up()
    {
        Schema::table('menus', function (Blueprint $table)
        {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('menus', function (Blueprint $table)
        {});
    }
}
