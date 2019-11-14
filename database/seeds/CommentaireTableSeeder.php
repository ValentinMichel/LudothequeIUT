<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 2019-10-21
 * Time: 16:42
 */
use \Illuminate\Database\Seeder;
class CommentaireTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Commentaire::class, 20)->create();
    }
}