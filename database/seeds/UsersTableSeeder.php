<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 2019-10-07
 * Time: 16:19
 */
use \Illuminate\Database\Seeder;
class UsersTableSeeder  extends Seeder {

    public function run()
    {
        factory(\App\User::class, 1)->create();
    }
}