<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        if (!Schema::hasTable('users')) {
            $this->call(UsersTableSeeder::class);
            $this->call(RoleUserTableSeeder::class);
//        }
//        if (!Schema::hasTable('meals')) {
            // Code to create table
            $this->call(MealsTableSeeder::class);
//        }
//        if (!Schema::hasTable('ingredients')) {
            // Code to create tsable
            $this->call(IngredientsTableSeeder::class);
//        }
//        if (!Schema::hasTable('permissions') || !Schema::hasTable('permissions') || !Schema::hasTable('roles')) {
            $this->call(PermissionsTableSeeder::class);
            $this->call(RolesTableSeeder::class);
            $this->call(ConnectRelationshipsSeeder::class);
//        }
    }
}
