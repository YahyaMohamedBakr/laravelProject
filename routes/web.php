<?php

use Illuminate\Support\Facades\Route;
use App\Models\Shop;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

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

$products = File::allFiles(resource_path().'/pages/');
// $document=YamlFrontMatter::parseFile( resource_path('pages/ring.html'));
// ddd($document->matter('title'));
$documents=[];
foreach($products as $product){
   $details= YamlFrontMatter::parseFile($product);

   $documents[]=new Shop(
    $details->title,
    $details->slug,
    $details->excerpt,
    $details->date,
    $details->price ,
    $details->category,
    $details->body()
);

}

//ddd($documents);

$all =Shop::all();
//ddd($all);

  // $path= base_path().'/resources/pages/html_layout/main.html';
  return view('welcome',[
      //'content'=> file_get_contents($path),
      //'content'=> Shop::find('ring'),
    'products' => $documents,
  ]);
});




  Route::get('/{name}', function($name){

    $productPage = Shop::find($name)[1];
   // ddd($productPage);
    $productDetails = YamlFrontMatter::parseFile($productPage);
      // $path= base_path().'/resources/pages/'.$name.'.html';

      // if(!file_exists($path)){
      //   return ddd('this file is not exist');
      // }

  //ddd($productDetails);
      return view('product',[
          'product'=> $productDetails,
          //'productName'=> $name
      ]);
    });

