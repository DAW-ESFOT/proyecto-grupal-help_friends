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

        for ($i = 0; $i < 4; $i++) {
            Image::create([
                'name' => $faker->word,
                'image'=> $faker->imageUrl()
            ]);
        }
    }
}
