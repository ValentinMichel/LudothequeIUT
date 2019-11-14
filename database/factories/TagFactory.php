<?php
$factory->define(
    \App\Models\Tag::class,
    function (Faker\Generator $faker) {
        $tags = array('FPS', 'Open World', 'TPS', 'RPG', 'MMORPG', 'BattleRoyal');
        return [
            'label' => $faker->unique()->randomElement($tags),
            //'jeux_id' => random_int(DB::table('jeux')->min('id'), DB::table('jeux')->max('id')),
        ];
    }
);