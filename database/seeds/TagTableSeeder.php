<?php
use \Illuminate\Database\Seeder;
class TagTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Tag::class, 20)->create();
        $jeux = \App\Models\Jeux::all();
        foreach ($jeux as $jeu){
            $jeu->tags()->attach($jeu->id);
        }
    }
}