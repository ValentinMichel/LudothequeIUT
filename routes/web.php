<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/jeux', 'GameControllerOld@index')->name('jeux.index');
Route::resource('jeux', 'GameController');
Route::resource('comments', 'CommentaireController');
Route::resource('tags', 'TagController');
Route::get('accueil', function () {
    echo "coucou";
});
Route::get('index', 'GameController@index');
Route::view('homepage', 'welcome');
Route::view('createGame', 'jeux/create');
Route::get('show/{id}', function ($id){
    return 'Jeux '.$id;
});

// à garder pour manipuler le homepage
Route::get('/', 'HomeController@index');
Route::get('apropos', 'HomeController@about');
Route::any('contact', 'HomeController@contact');

// Route pour GameController
Route::get('jeux', 'GameController@index');
Route::any('create', 'GameController@create');
Route::any('/jeux/{id}/edit', function(){
    return view('GameController@edit', '{{id}}');
});
Route::get('jeux/{id}', function (){
    return view('GameController@show', '{{id}}');
});
// Route pour CommentaireController
Route::get('comments', 'CommentaireController@index');
Route::any('comments/create', 'CommentaireController@create');
Route::get('comments/{id}', function (){
    return view('CommentaireController@show', '{{id}}');
});
// Route pour TagController
Route::get('tags', 'TagController@index');
Route::get('tags/create', 'TagController@create');
// test pour blade content
Route::get('/exemple', function () {
    return view('exemple');
});