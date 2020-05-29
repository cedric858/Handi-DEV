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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
    //Route::delete('authors/mass_destroy','AuthorsController@mass_destroy')->name('authors.mass_destroy');
    //Route::delete('books/mass_destroy','BooksController@mass_destroy')->name('books.mass_destroy');
    Route::resource('indicateurs','IndicateurController');
    Route::resource('domaines','DomaineController');
    Route::resource('langues','LangueController');
    Route::resource('respophs','ResponsableController');
    Route::resource('typehandicaps','TypeHandicapController');
    Route::resource('ophs','OphController');
    Route::resource('regions','RegionController');
    Route::resource('cheflieus','CheflieuController');
    Route::resource('provinces','ProvinceController');
    Route::resource('communes','CommuneController');
    Route::resource('valeurs','ValeurIndicateurController');
    Route::resource('typedesagregations','TypeDesagregationController');
    Route::resource('users','UserController');
    Route::get('accueil','AdminController@index');
    Route::get('/','AdminController@index');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
