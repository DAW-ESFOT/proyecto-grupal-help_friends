<?php

use App\Image;
use App\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciamos la tabla Image
        Image::truncate();
        $faker = \Faker\Factory::create();

        $articles = App\Article::all();

        foreach ($articles as $article) {
            for ($i = 0; $i < 2; $i++) {
                Image::create([
                    'image' => $faker->imageUrl(),
                    'article_id' => $article->id,
                    'user_id' => $faker->numberBetween(1, 10)
                ]);
            }
        }
    }
}