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




  Route::get('/blog', function(){
  
      $path= base_path().'/resources/posts/posts.html';
      return view('posts',[
          'content'=> file_get_contents($path),
          'blogPath'=> '/blog/'
      ]);
    });
  
    Route::get('/blog/{post}', function($post){
  
      $path= base_path().'/resources/posts/'.$post.'.html';
      return view('post',[
          'post'=> file_get_contents($path),
          'blogPath'=> '/blog/'.$post
      ]);
    });