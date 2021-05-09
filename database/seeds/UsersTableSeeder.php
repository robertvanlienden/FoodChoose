<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'test',
                'username' => 'testnl',
                'email' => 'test@test.nl',
                'email_verified_at' => NULL,
                'password' => '$2y$10$C/FRp5XS0DUzo4M4xIbKne4RD4e64u5SoKyqMSJhnbRAI6tMxA9nq',
                'remember_token' => NULL,
                'created_at' => '2019-10-23 19:32:13',
                'updated_at' => '2019-10-23 19:32:13',
            ),
            1 =>
            array (
                'id' => '2',
                'name' => 'test',
                'username' => 'testcom',
                'email' => 'test@test.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$xyyIkmQpME6f1h6KaggmueELGtW3ffbbGoLFu2FXzIh8VF6c7L/c.',
                'remember_token' => NULL,
                'created_at' => '2019-10-23 20:56:22',
                'updated_at' => '2019-10-23 20:56:22',
            ),
        ));


    }
}
