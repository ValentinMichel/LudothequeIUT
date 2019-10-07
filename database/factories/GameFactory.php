<?php
$factory->define(
    App\Http\Models\Jeux::class,
    function (Faker\Generator $faker) {
        return [
            'title' => $faker->name,
            'annee_sortie' => $faker->year,
            'description' => $faker->paragraph,
            'age_min' => $faker->randomElement($array = array('14+', '16+', '18+')),
            'categorie' => $faker->randomElement($array = array('FPS', 'Open World', 'RPG', 'MMORPG', 'BattleRoyal')),
        ];
    }
);