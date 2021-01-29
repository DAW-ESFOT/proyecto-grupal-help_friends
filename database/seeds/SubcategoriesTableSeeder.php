<?php

use App\SubCategory;
use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        SubCategory::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla

        for ($i = 0; $i < 5; $i++) {
            SubCategory::create([
                'name' => $faker->sentence,
                'categories_id' => $faker->numberBetween(1, 3),
            ]);
        }
    }
}
