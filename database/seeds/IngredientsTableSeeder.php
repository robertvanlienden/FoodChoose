<?php

use Illuminate\Database\Seeder;

class IngredientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('ingredients')->delete();

        \DB::table('ingredients')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'test',
                'user_id' => '1',
                'created_at' => '2020-01-30 15:55:16',
                'updated_at' => '2020-01-30 15:55:16',
            ),
            1 =>
            array (
                'id' => '2',
                'name' => 'test2',
                'user_id' => '1',
                'created_at' => '2020-01-30 15:55:21',
                'updated_at' => '2020-01-30 15:55:21',
            ),
            2 =>
            array (
                'id' => '3',
                'name' => 'ui',
                'user_id' => '1',
                'created_at' => '2020-01-30 15:55:29',
                'updated_at' => '2020-01-30 15:55:29',
            ),
            3 =>
            array (
                'id' => '4',
                'name' => 'kaas',
                'user_id' => '2',
                'created_at' => '2020-01-30 15:55:36',
                'updated_at' => '2020-01-30 15:55:36',
            ),
            4 =>
            array (
                'id' => '5',
                'name' => 'banaan',
                'user_id' => '2',
                'created_at' => '2020-01-30 15:55:41',
                'updated_at' => '2020-01-30 15:55:41',
            ),
        ));


    }
}
