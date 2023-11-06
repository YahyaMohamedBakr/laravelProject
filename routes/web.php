<?php

use Illuminate\Support\Facades\Route;
use App\Models\Shop;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', function(){

$all =Shop::all();
//ddd($all);

  // $path= base_path().'/resources/pages/html_layout/main.html';
  return view('welcome',[
      //'content'=> file_get_contents($path),
      //'content'=> Shop::find('ring'),
    'products' => $all,
  ]);
});




  Route::get('/{name}', function($name){

    $product = Shop::find($name);

      // $path= base_path().'/resources/pages/'.$name.'.html';

      // if(!file_exists($path)){
      //   return ddd('this file is not exist');
      // }
      return view('product',[
          'productDetails'=> $product,
          'productName'=> $name
      ]);
    });

