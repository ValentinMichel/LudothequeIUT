<?php
use \Illuminate\Support\Facades\DB;
$factory->define(
    \App\Models\Commentaire::class,
    function (Faker\Generator $faker) {
        return [
            'titre' => $faker->name,
            'body' => $faker->paragraph,
            'auteur' => $faker->name,
            'jeux_id' => random_int(DB::table('jeux')->min('id'), DB::table('jeux')->max('id')),
        ];
    }
);