<?php
use \Illuminate\Database\Seeder;
class TagTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Tag::class, 6)->create();
        $jeux = \App\Models\Jeux::all();
        foreach ($jeux as $jeu){
            $jeu->tags()->attach(rand(1,6));
            if($jeu->id % 2 == 0) {
                $jeu->tags()->attach(rand(1,6));
                $jeu->tags()->attach(rand(1,6));
            }
            $jeu->tags()->attach(rand(1,6));
        }
    }
}