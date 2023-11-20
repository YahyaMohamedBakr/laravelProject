<?php

use Illuminate\Support\Facades\Route;
use App\Models\Shop;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

use function PHPSTORM_META\map;

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

   // $products = File::allFiles(resource_path().'/pages/');
    // $document=YamlFrontMatter::parseFile( resource_path('pages/ring.html'));
    // ddd($document->matter('title'));
    //$documents=[];
    $documents = shop::all();
    // $documents= collect(File::allFiles(resource_path().'/pages/'))
    //     ->map(function($product){
    //     return YamlFrontMatter::parseFile($product);
    //     })
    //     ->map(function($details){
    //         return new Shop(
    //             $details->title,
    //             $details->slug,
    //             $details->img,
    //             $details->excerpt,
    //             $details->date,
    //             $details->price ,
    //             $details->category,
    //             $details->body()
    //             );
    //     });


//    $documents= collect($products)
//     ->map(function($product){
//         $details= YamlFrontMatter::parseFile($product);
//         return new Shop(
//             $details->title,
//             $details->slug,
//             $details->img,
//             $details->excerpt,
//             $details->date,
//             $details->price ,
//             $details->category,
//             $details->body()
//         );
//     });
    //   $documents= array_map(function($product){

    //     $details= YamlFrontMatter::parseFile($product);
    //     return new Shop(
    //         $details->title,
    //         $details->slug,
    //         $details->img,
    //         $details->excerpt,
    //         $details->date,
    //         $details->price ,
    //         $details->category,
    //         $details->body()
    //     );

    // }, $products);

    //ddd($documents);

    // foreach($products as $product){
    // $details= YamlFrontMatter::parseFile($product);

    // $documents[]=new Shop(
    //     $details->title,
    //     $details->slug,
    //     $details->img,
    //     $details->excerpt,
    //     $details->date,
    //     $details->price ,
    //     $details->category,
    //     $details->body()
    //     );

    // }

    // var_dump($documents);
    // die();

    //ddd(var_dump($documents));

    //$all =Shop::all();
    //ddd($all);

  // $path= base_path().'/resources/pages/html_layout/main.html';
  return view('welcome',[
      //'content'=> file_get_contents($path),
      //'content'=> Shop::find('ring'),
    'products' => $documents,
  ]);
});




  Route::get('/{name}', function($name){

    //$productPage = Shop::find($name)[1];
    $product = Shop::find($name);
   //ddd($productPage);
    //$productDetails = YamlFrontMatter::parseFile($productPage);
      // $path= base_path().'/resources/pages/'.$name.'.html';

      // if(!file_exists($path)){
      //   return ddd('this file is not exist');
      // }

  //ddd($productDetails);
      return view('product',[
          'product'=> $product,
          //'productName'=> $name
      ]);
    });

