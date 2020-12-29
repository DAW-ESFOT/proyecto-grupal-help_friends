<?php

use App\Comentary;
use Illuminate\Database\Seeder;

class ComentaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Comentary::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Comentary::create([
                'description' => $faker->sentence,
            ]);
        }
    }
}
