<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{
    //
        public function test()
        {
        	 $rowId= '8cbf215baa3b757e910e5305ab981172';
            //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
           // Cart::update($rowId, 2);
        	$cart_total= Cart::total();
            $cart= Cart::content();
            dd($cart_total);
        }
}
