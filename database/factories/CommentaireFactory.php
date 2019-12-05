<?php
use \Illuminate\Support\Facades\DB;
$factory->define(
    \App\Models\Commentaire::class,
    function (Faker\Generator $faker) {
        return [
            'titre' => $faker->name,
            'body' => $faker->text,
            'auteur' => 'Valentin', // car user d'id 1 dans le Faker.
            'auteur_id' => 1,
            'jeux_id' => random_int(DB::table('jeux')->min('id'), DB::table('jeux')->max('id')),
        ];
    }
);