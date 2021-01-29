<?php

use App\Image;
use Illuminate\Database\Seeder;

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
            Image::create([
                'name' => $faker->word,
                'image' => $faker->imageUrl(),
                'article_id' => $article->id
            ]);

        }
    }
}