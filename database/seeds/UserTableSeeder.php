<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla
        User::truncate();

        $faker = \Faker\Factory::create();
        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');
        User::create([
            'name' => 'Administrador',
            'lastname' => 'admin',
            'phone' => 252525,
            'province' => 'pichincha',
            'canton' => 'quito',
            'sector' => 'la mena',
            'image' => 'none',
            'email' => 'admin@prueba.com',
            'password' => $password,]);
        // Generar algunos usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'lastname' => $faker->lastName,
                'phone'=>$faker->phoneNumber,
                'province'=>$faker->state,
                'canton'=>$faker->city,
                'sector'=>$faker->word,
                'image'=>$faker->image(),
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
