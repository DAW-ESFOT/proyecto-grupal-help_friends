<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        //$this->call(CategoryTableSeeder::class);
        //$this->call(SubcategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
      //  $this->call(ComentaryTableSeeder::class);
      //  $this->call(UserTableSeeder::class);
        Schema::disableForeignKeyConstraints();

    }
}
