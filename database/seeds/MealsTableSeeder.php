<?php

use Illuminate\Database\Seeder;

class MealsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('meals')->delete();

        \DB::table('meals')->insert(array (
            0 =>
            array (
                'id' => '1',
                'user_id' => '1',
                'meal_name' => 'Lasagne bolognese',
                'public' => '1',
                'created_at' => '2019-10-25 08:48:36',
                'updated_at' => '2019-10-25 08:52:54',
            ),
            1 =>
            array (
                'id' => '2',
                'user_id' => '1',
                'meal_name' => 'Pasta Pesto',
                'public' => '1',
                'created_at' => '2019-10-25 08:48:40',
                'updated_at' => '2019-10-25 08:53:08',
            ),
            2 =>
            array (
                'id' => '3',
                'user_id' => '1',
                'meal_name' => 'Bruine bonen soep',
                'public' => '0',
                'created_at' => '2019-10-25 08:50:06',
                'updated_at' => '2019-10-25 08:53:19',
            ),
            4 =>
                array (
                    'id' => '4',
                    'user_id' => '2',
                    'meal_name' => 'Lasagne bolognese',
                    'public' => '0',
                    'created_at' => '2019-10-25 08:48:36',
                    'updated_at' => '2019-10-25 08:52:54',
                ),
            5 =>
                array (
                    'id' => '5',
                    'user_id' => '2',
                    'meal_name' => 'Pasta Pesto',
                    'public' => '0',
                    'created_at' => '2019-10-25 08:48:40',
                    'updated_at' => '2019-10-25 08:53:08',
                ),
            6 =>
                array (
                    'id' => '6',
                    'user_id' => '2',
                    'meal_name' => 'Bruine bonen soep',
                    'public' => '0',
                    'created_at' => '2019-10-25 08:50:06',
                    'updated_at' => '2019-10-25 08:53:19',
                ),
        ));


    }
}
