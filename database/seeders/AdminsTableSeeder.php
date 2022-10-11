<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        activity()->withoutLogs(function () {
            \DB::table('admins')->delete();

            \DB::table('admins')->insert(array (
                0 =>
                    array (
                        'id' => 1,
                        'name' => 'Admin',
                        'email' => 'admin@admin.com',
                        'lang' => 'az',
                        'role_id' => 1,
                        'password' => '$2y$10$iKCm6QweuzxFjbNfAhIqXe2UvBnt9BJIzCGTORj.UigkGFl8CI9Pu',
                        'remember_token' => 'U97iCbvBrNll4GdeQZ1I9DKSDlslIq2kPyUOcoEiRPITLytO3j8MqWG4fYn1',
                        'created_at' => '2022-02-22 16:18:14',
                        'updated_at' => '2022-02-22 16:18:14',
                    ),
                1 =>
                    array (
                        'id' => 2,
                        'name' => 'Developer',
                        'email' => 'dev@dev.com',
                        'lang' => 'az',
                        'role_id' => 2,
                        'password' => '$2y$10$fiUmcXpduSrE39fbAUYmleBGZYBcD9rAVsgGhyHsg8YOKUE7kf7ua',
                        'remember_token' => 'abZuESiuoyDGTPFmwtzNlbtQjuRsTyqUNJZD1RFZpmxNi8e5dS7vxJSy0RWC',
                        'created_at' => '2022-02-22 17:08:51',
                        'updated_at' => '2022-02-22 17:08:51',
                    ),
            ));
        });




    }
}
