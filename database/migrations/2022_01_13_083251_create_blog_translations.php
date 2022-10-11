<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTranslations extends Migration
{
    public function up()
    {
        Schema::create('blog_translations', function (Blueprint $table)
        {
            $table->increments('id');
            $table->unsignedInteger('blog_id');

            $table->string('name', 255)->nullable();
            $table->string('slug', 255)->unique()->nullable();
            $table->string('locale', 2);

            $table->string('title', 255)->nullable();
            $table->string('keywords', 255)->nullable();
            $table->string('description', 255)->nullable();

            $table->longText('text')->nullable();


            $table->unique(['blog_id', 'locale']);

            $table->foreign('blog_id')
                ->references('id')
                ->on('blogs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_translations');
    }
}
