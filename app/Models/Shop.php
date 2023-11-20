<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use function PHPSTORM_META\map;

class Shop {

    public $title;
    public $slug;
    public $img;
    public $excerpt;
    public $date;
    public $price;
    public $category;
    public $body;
function __construct($title,$slug,$img, $excerpt, $date,$price, $category , $body){

    $this->title =$title;
    $this->slug =$slug;
    $this->img =$img;
    $this->excerpt =$excerpt;
    $this->date =$date;
    $this->price= $price;
    $this->category =$category;
    $this->body =$body;

}
    public static function all(){
        // $products = File::allFiles(resource_path().'/pages/');
         //$products = File::allFiles(resource_path('pages'));
        // return array_map(function ($product){
        //    return $product->getContents();
        // },$products);


      //return cache()->rememberForever('products.all', function () {
        return collect(File::allFiles(resource_path('pages')))
        ->map(function($product){
        return YamlFrontMatter::parseFile($product);
        })
        ->map(function($details){
            return new Shop(
                $details->title,
                $details->slug,
                $details->img,
                $details->excerpt,
                $details->date,
                $details->price ,
                $details->category,
                $details->body()
                );
        })
        //->sortBy('date')
        ->sortByDesc('title')
        ;

     // });
    }
    public static function find($slug){
       //dd(static::all()->firstWhere('slug', $slug));
      //return static::all()->firstWhere('title', $slug);
        return static::all()->firstWhere('slug', $slug);


    //   $path= resource_path().'/pages/'.$slug.'.html';

    //   if(!file_exists($path)){
    //     return ddd('this file is not exist');
    //   }

    //   return [file_get_contents($path), $path];

    }
}
