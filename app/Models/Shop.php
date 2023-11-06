<?php
namespace App\Models;
use File;
class Shop {

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

      return file_get_contents($path);

    }
}
