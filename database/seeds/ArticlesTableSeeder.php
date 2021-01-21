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
        for ($i = 0; $i < 20; $i++) {
           // $image_name = $faker->image('public/storage/articles', 400, 300, null, false);
            Articles::create([

                'name' => $faker->word,
                'description' => $faker->text,
                'commentary' => $faker->text,
                'user_id' => $faker->numberBetween(1, 3),
                'user_id_pub' => $faker->numberBetween(1, 3),
                'subCategory_id' => $faker->numberBetween(1, 3),

                //'image'=>$faker->imageUrl(400,300,null,false),

            ]);
        }
    }
}
