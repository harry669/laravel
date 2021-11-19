<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Image as ProductImage;
class ImageController extends Controller
{
    //

       public function ImageUpload()
       {
           $product_list= Product::all();
           return view('product-image', ['product_list' => $product_list]);
       }

       public function ImageStore(Request $request)
       {
             $request->validate([
            'image-upload' => 'required|mimes:jpeg',
            'product-select' => 'required'
             ]);


              $fileName= $request->file('image-upload')->hashName();

            // $fileName = $request->file('image-upload')->getClientOriginalName();

             //store product image in db
              $product_image= new ProductImage();

              $product_image->product_image=  $fileName;
              $product_image->product_id=  $request->input('product-select');
              $product_image->save();

             $request->file('image-upload')->store('product');

              return back()
            ->with('success', 'File uploaded');
       }
}
