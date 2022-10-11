<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToMenuTranslations extends Migration
{
    public function up()
    {
        Schema::table('menu_translations', function (Blueprint $table)
        {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('menu_translations', function (Blueprint $table)
        {});
    }
}
