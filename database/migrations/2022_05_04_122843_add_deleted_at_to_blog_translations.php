<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToBlogTranslations extends Migration
{
    public function up()
    {
        Schema::table('blog_translations', function (Blueprint $table)
        {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('blog_translations', function (Blueprint $table)
        {});
    }
}
