<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageAltToBlogTranslations extends Migration
{
    public function up()
    {
        Schema::table('blog_translations', function (Blueprint $table)
        {
            $table->string('image_alt', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::table('blog_translations', function (Blueprint $table)
        {
            $table->dropColumn('image_alt');
        });
    }
}
