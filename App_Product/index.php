<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


require __DIR__ . '/model.php';
require __DIR__ . '/controller.php';
require __DIR__ . '/route.php';


// Route::run('/uyeler', 'uyeler@index');
// Route::run('/uyeler', 'uyeler@post', 'post');
// Route::run('/uye/{url}', 'uye@index');
// Route::run('/profil/sifre-degistir', 'profile/changepassword@index');

// 1.si class @'ten sonrakide method oluyor. örnek uyeler@index  uyeler classındaki index methodunu çağır

// Route::run('/', 'homepage@index');
//Login
Route::run('/signin', 'cAuth@getLogin',);
Route::run('/signin', 'cAuth@postLogin', 'post');

// //Register
 Route::run('/signup', 'cAuth@getRegister');
Route::run('/signup', 'cAuth@postRegister','post');
Route::run('/succes', 'cAuth@succes',);

Route::run('/homepage', 'homepage@getHomePage',);
Route::run('/homepage', 'homepage@addApppoint','post');
// Route::run('/succes', 'cAuth@succes');
// Route::run('/key/{url}', 'cAuth@key');

//home

// Route::run('/student/home', 'home@index');