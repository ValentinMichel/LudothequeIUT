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


//Route::get('/jeux', 'GameControllerOld@index')->name('jeux.index');
Route::resource('jeux', 'GameController')->middleware('auth');
Route::resource('comments', 'CommentaireController')->middleware('auth');
Route::resource('tags', 'TagController')->middleware('auth');
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
Route::get('apropos', 'MenuController@about')->name('home.about');
Route::any('contact', 'MenuController@contact')->name('home.contact');

// Route pour GameController
Route::get('jeux', 'GameController@index')->name('jeux.index');
Route::any('create', 'GameController@create')->name('jeux.create');
Route::any('/jeux/{id}/edit', function(){
    return view('GameController@edit', '{{id}}');
})->name('jeux.edit');
Route::post('/jeux/upload', 'GameController@upload')->name('jeux.upload');
Route::get('jeux/{id}', function (){
    return view('GameController@show', '{{id}}');
})->name('jeux.show');
// Route pour CommentaireController
Route::get('comments', 'CommentaireController@index')->name('comments.index');
Route::any('comments/create', 'CommentaireController@create')->name('comments.create');
Route::get('comments/{id}', function (){
    return view('CommentaireController@show', '{{id}}');
})->name('comments.show');
// Route pour TagController
Route::get('tags', 'TagController@index')->name('tags.index');
Route::get('tags/create', 'TagController@create')->name('tags.create');
// test pour blade content
Route::get('/exemple', function () {
    return view('exemple');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');
Route::get('/admin/members', 'AdminController@members')->middleware('is_admin')->name('admin.members');
Route::post('/admin/members/update', 'AdminController@update')->middleware('is_admin')->name('member.update');