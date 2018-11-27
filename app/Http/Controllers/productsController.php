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


    public function updateCart(Request $request) {

     
         $productID = $request->input('itemID');
         $productID = (int)$productID;
         
         $productQty = $request->input('qty');
         $productQty = (int)$productQty;

         if (Auth::check()) {
             // Authentication passed...

             $userId = auth()->user()->id; // or any string represents user identifier
             Cart::session($userId)->update($productID, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $productQty
                ),
              ));
         
         return redirect()->route('cart');
     
         }else
         {
            
            Cart::update($productID, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $productQty
                ),
              ));
              return redirect()->route('cart');
         }
    }


    public function customAddCart(Request $request) {

        $size = $request->input('size');


        $productID;
        $productName = 'Custom Kennel ';

        if((!($request->input('feature1')) && (!($request->input('feature2'))) && (!($request->input('feature3'))) && (!($request->input('feature4'))))){
            
            return \Redirect::back()->withErrors(['Atleast one Feature is Required']);

        }


        if($size == 'small'){
            $productID = 1;  
            $productName = $productName . '(Small';

        }else if($size == 'standard'){
            $productID = 2;  
            $productName = $productName . '(Standard';
        }else{
            $productID = 3;  
            $productName = $productName . '(Large';
        }
     //id has to be numeric a differnt number corresponds to a different feature
        if(!(empty($request->input('feature1')))){
            
            $productID =  $productID . '6'; 
        }

        if(!(empty($request->input('feature2')))){
            
            $productID =  $productID . '7';  
        }

        if(!(empty($request->input('feature3')))){
            
            $productID =  $productID . '8'; 
        }

        if(!(empty($request->input('feature4')))){
            
            $productID =  $productID . '9';   
        }
        //storing string version for building name
        $productIdTemp = $productID;
        //converting to int
        $productID = (int)$productID;
        $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);
        
        while(!(strlen($productIdTemp) == 0)){
            //creating the name for the cart and database entry
            $productName = $productName . ', ';

            if($productIdTemp[0] == 6){
                $productName = $productName . 'Bowls';
            }else if($productIdTemp[0] == '7'){
                $productName = $productName . 'Roof';
            }else if($productIdTemp[0] == '8'){
                $productName = $productName . 'Lock';
            }else if($productIdTemp[0] == '9'){
                $productName = $productName . 'Floor';
            }

            $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);

        }
        
        $productName = $productName . ')';
        //dd($productName);


        if (Auth::check()) {
            // Authentication passed...

            $userId = auth()->user()->id; // or any string represents user identifier
            Cart::session($userId)->add($productID, $productName, 99.99, 1, array());
        
        return redirect()->route('products');
    
        }else
        {
           
           Cart::add($productID, $productName, 99.99, 1, array());
               
             return redirect()->route('products');
        }
   }

    

    public function removeFromCart(Request $request) {
      
        //dd($request); 

         $productID = $request->input('itemID');
         
        

         if (Auth::check()) {
             // Authentication passed...
            
             $userId = auth()->user()->id; // or any string represents user identifier
             Cart::session($userId)->remove($productID);
         
         return redirect()->route('cart');
     
         
         }else
         {
            Cart::remove($productID);

            return redirect()->route('cart');
         }
    }


    public function checkoutComplete(Request $request) {
      
        //dd($request); 
        $address = $request->input('address');
        $state = $request->input('state');
        $city = $request->input('city');
        $zip = $request->input('zip');





        
         if (Auth::check()) {
             // Authentication passed...
            
             $userId = auth()->user()->id; // or any string represents user identifier
             Cart::session($userId);
         
         return view('invoice')->with(['address', $address],['state', $state],['city', $city],['zip', $zip]);
     
         
         }else
         {
          
            return view('invoice')->with(['address', $address],['state', $state],['city', $city],['zip', $zip]);
         }
    }

}