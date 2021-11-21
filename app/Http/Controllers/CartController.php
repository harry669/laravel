<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use App\Product;
use App\Price;
use App\Cart as CartStorage;
use App\User;
class CartController extends Controller
{
    //
        public function test()
        {
        	 $current_user= Auth::user();
        	 $rowId= '8cbf215baa3b757e910e5305ab981172';
        	 $cart_content= Cart::instance($current_user)->content();
        	 $cart_result=  $cart_content->search(function ($cartItem) {
             	return $cartItem->id === "293ad";
              });
             
             //Cart::instance($current_user)->add('293af', 'Product 2', 1, 9.99, 550,['user' => 1]);
             //Cart::store('admin');
             //$cart= Cart::instance($current_user)->content();
             //$cart= Cart::instance($current_user)->store($current_user->id);
             //Cart::associate($cart_obj->rowId, 'User');

           // Cart::update($rowId, 2);
        	//$cart_total= Cart::total();
            //$cart= Cart::content();
        	//Cart::destroy();
        	//$cart= Cart::content();
        	 dd($cart_result);
        }

        public function addToCart(Request $request)
        {
        	$product_id= $request->input('product_id');
        	$product_quantity= $request->input('product-add'.$product_id);
            $product= Product::where('id', $product_id)->first();
            $product_price= $this->getPrice($product_id);
            $product_quantity= $this->getQuantity($product_quantity);
            $product_weight= $this->getweight(550);
            $cart_obj = Cart::add($product_id,$product->product_name,$product_quantity,$product_price,$product_weight);
            $save_cart= $this->saveToCart($cart_obj);
            //$cart_quantity= $cart_obj->qty;
             return back()
            ->with('success', 'Item Added in cart');
        }

        public function getPrice($product_id)
        {
             $product_price= Price::where('product_id', $product_id)->first();
             return $product_price->product_price;
        }

        public function getQuantity($quantity)
        {
        	 return $quantity;
        }

        public function getWeight($weight)
        {
        	 return $weight;
        }

        public function UpdateBar()
        {
        	 $cart_data= Cart::content();
        	 return response()
            ->json(['cart' => $cart_data]);
        }

        public function saveToCart($cart_obj)
        {
             if (Auth::check()) {

                    //user is logged in 
             	   $cart_id= $cart_obj->rowId;
             	    $User_Cart = CartStorage::updateOrCreate(
                          ['cart_id' => $cart_id],
                          ['user_id' => Auth::id()]
                       );


             	  return true;
              }

              return false;
        }


}
