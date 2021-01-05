<?php

use App\Articles;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articles::truncate();
        $faker = \Faker\Factory::create();

        // Crear artículos ficticios en la tabla
        for($i = 0; $i < 50; $i++) {
            Articles::create([
                'image'=>$faker->image(),
                'description' => $faker->paragraph,
                'comentary' => $faker->paragraph,
            ]);
        }
    }
}
