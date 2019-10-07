<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 2019-10-07
 * Time: 16:19
 */
use \Illuminate\Database\Seeder;
class GameTableSeeder  extends Seeder {

    public function run()
    {
        factory(\App\Http\Models\Jeux::class, 20)->create();
    }
}