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

        //$this->call(SubCategoryTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ComentaryTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}
