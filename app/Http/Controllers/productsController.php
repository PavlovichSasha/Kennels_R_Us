<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Cart;

class productsController extends Controller {

 

   

   public function addToCart(Request $request) {
      
   //dd($request);

    $productID = $request->input('id');
    $productName = $request->input('name');
    $productPrice = $request->input('price');
    $productQty = $request->input('qty');

    $credentials = $request->only('email', 'password');
    //dd($request); 
    
    if (Auth::check()) {
        // Authentication passed...
        //dd($request); 

        $userId = auth()->user()->id; // or any string represents user identifier
        Cart::session($userId)->add($productID, $productName, $productPrice, $productQty, array());
    
    return redirect()->route('products');

    }else
    {

        Cart::add($productID, $productName, $productPrice, $productQty, array());
        return redirect()->route('products');

    }



    }
}