<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


require __DIR__ . '/model.php';
require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';



//Login
Route::run('/signin', 'cAuth@getLogin');
Route::run('/signin', 'cAuth@postLogin', 'post');


// //Register
 Route::run('/signup', 'cAuth@getRegister');
Route::run('/signup', 'cAuth@postRegister','post');
Route::run('/succes', 'cAuth@succes');

//Forgot
Route::run('/forgot', 'forgot@index');
Route::run('/forgot', 'forgot@mail','post');

Route::run('/password/{url}/{url}', 'forgotUpdate@index');
Route::run('/password/{url}/{url}', 'forgotUpdate@update','post');

Route::run('/newpassword', 'password@index');
Route::run('/newpassword', 'password@update','post');

Route::run('/homepage', 'homepage@getHomePage');


Route::run('/homepage', 'homepage@addApppoint','post');
Route::run('/cancel', 'homepage@cancel');

Route::run('/profile', 'profile@index');
Route::run('/profile', 'profile@update','post');
Route::run('/history', 'history@index');

// Route::run('/succes', 'cAuth@succes');
// Route::run('/key/{url}', 'cAuth@key');

//home

// Route::run('/student/home', 'home@index');