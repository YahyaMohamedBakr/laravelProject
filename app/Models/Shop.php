<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
class Shop {

    public $title;
    public $slug;
    public $excerpt;
    public $date;
    public $price;
    public $category;
    public $body;
function __construct($title,$slug, $excerpt, $date,$price, $category , $body){

    $this->title =$title;
    $this->slug =$slug;
    $this->excerpt =$excerpt;
    $this->date =$date;
    $this->price= $price;
    $this->category =$category;
    $this->body =$body;

}
    public static function all(){
        $products = File::allFiles(resource_path().'/pages/');
        return array_map(function ($product){
           return $product->getContents();
        },$products);
    }
    public static function find($slug){

      $path= resource_path().'/pages/'.$slug.'.html';

      if(!file_exists($path)){
        return ddd('this file is not exist');
      }

      return [file_get_contents($path), $path];

    }
}
