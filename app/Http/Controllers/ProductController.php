<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //

       public function index()
       {
       	   $list= DB::table('products')
       	          ->join('images', 'products.id','=', 'images.product_id')
       	          ->get();


       	    
           return view('product.list',['list' => $list]);
       }
}
