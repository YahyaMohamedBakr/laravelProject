<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', function(){
  
  $path= base_path().'/resources/pages/main.html';
  return view('welcome',[
      'content'=> file_get_contents($path),
      
  ]);
});




  Route::get('/{name}', function($name){
  
      $path= base_path().'/resources/pages/'.$name.'.html';
      return view('product',[
          'productDetails'=> file_get_contents($path),
          'productName'=> $name
      ]);
    });
  
  