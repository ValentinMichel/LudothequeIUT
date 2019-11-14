<?php
$factory->define(
    \App\Models\Jeux::class,
    function (Faker\Generator $faker) {
        $titre = array('Call of Duty : Modern Warfare', 'Apex Legends', 'Titanfall', 'Titanfall 2', 'Star Wars The Old Republic',
            'Red Dead Redemption 2', 'Star Wars : Fallen Order', 'Assassin\'s Creed : Odyssey', 'Assassin\'s Creed : Origin', 'Anthem',
            'Call of Duty : Black Ops 4', 'Borderlands 3', 'Ghost Recon Wildlands', 'Ghost Recon Breakpoint', 'Watch Dogs Legion',
            'Watch Dogs 1', 'Watch Dogs 2', 'GTA V', 'Star Wars Battlefront 2', 'Star Wars Battlefront');
        return [
            'title' => $faker->unique()->randomElement($titre),
            'annee_sortie' => $faker->year,
            'description' => $faker->paragraph,
            'age_min' => $faker->randomElement($array = array('14+', '16+', '18+')),
            'categorie' => $faker->randomElement($array = array('FPS', 'Open World', 'RPG', 'MMORPG', 'BattleRoyal')),
        ];
    }
);