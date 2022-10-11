<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSomeFiledUserInfosTable extends Migration
{
    public function up()
    {
        Schema::table('user_infos', function (Blueprint $table)
        {
            if (Schema::hasColumn('user_infos', 'address')) {
                $table->dropColumn('address');
            }

            if (Schema::hasColumn('user_infos', 'phone')) {
                $table->dropColumn('phone');
            }
        });
    }

    public function down()
    {
        Schema::table('user_infos', function (Blueprint $table)
        {
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
}
