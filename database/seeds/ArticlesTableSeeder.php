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
        for($i = 0; $i < 20; $i++) {
            Articles::create([
                
                'description' => $faker->text,
                'commentary' => $faker->text,
                'user_id' => $faker->numberBetween(1, 3),
                'user_id_pub' => $faker->numberBetween(1, 3),
                'subCategory_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
