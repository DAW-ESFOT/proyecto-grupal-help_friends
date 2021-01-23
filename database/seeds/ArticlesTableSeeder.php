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
        //Vaciar la tabla articles
        Articles::truncate();
        $faker = \Faker\Factory::create();

        //Obtenemos la lista de todos los usuarios creados e
        //iteramos sobre cada uno y simulamos un inicio de sesión
        //con cada uno para crear articulos en su nombre
        $users = \App\User::all();
        foreach ($users as $user) {
            //iniciamos sesion con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

            //y ahora con este usuario creamos algunos articulos
            for ($i = 0; $i < 5; $i++) {
                Articles::create([
                    'name' => $faker->word,
                    'description' => $faker->text,
                    'commentary' => $faker->text,
                    'user_id_pub' => $faker->numberBetween(1, 3),
                    'subCategory_id' => $faker->numberBetween(1, 3),

                ]);
            }
        };

    }
}
