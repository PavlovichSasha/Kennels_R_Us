<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Cart;

class checkoutController extends Controller {

    public function checkoutComplete(Request $request) {
      
        //dd($request); 
        $name = $request->input('fname');
        $firstName;
        $lastName;
        if (preg_match('/\s/',$name)){
            $namePieces = explode(" ", $name, 2);
            $firstName = $namePieces[0];
            $lastName = $namePieces[1];
        }
        else {
            $firstName = $name;
            $lastName = $name;
        }

        $address = $request->input('address');
        $state = $request->input('state');
        $city = $request->input('city');
        $zip = $request->input('zip');

        $email = $request->input('email');
        $phone = $request->input('phone');
        $rating = $request->input('rating');

        $shippingAddress = $request->input('shippingAddress');
        $shippingState = $request->input('shippingState');
        $shippingCity = $request->input('shippingCity');
        $shippingZip = $request->input('shippingZip');

        $fullAddress = $address . " "  . $state  . " " . $city . " " . $zip;

        if(!($shippingAddress == null )){

            $shippingFullAddress = $shippingAddress . " " . $shippingState . " " . $shippingCity . " " . $shippingZip;
        } else $shippingFullAddress = $address . " "  . $state  . " " . $city . " " . $zip;

         if (Auth::check()) {
             // Authentication passed...
            
             $userId = auth()->user()->id;
             $items = Cart::session($userId)->getContent();
             $total = Cart::session($userId)->getTotal();

            if(Auth::user()->customerId == 0){
                
                DB::table('tblcustomer')->insertGetId([
                    'LastName'=> $lastName,
                    'firstName' => $firstName,
                    'billingAddress' => $fullAddress, 
                    'phone' => $phone,
                    'email' => $email, 
                    'ShippingAddress' => $shippingFullAddress,
                    'serviceAnswer' => $rating
                ]); 
                    //getting cust id
                $customerId = DB::table('tblcustomer')
                ->where('LastName', '=', $lastName)
                    ->where('firstName' , '=',$firstName)
                    ->where('billingAddress' , '=', $fullAddress) 
                    ->where('phone' , '=', $phone)
                    ->where( 'email' , '=', $email) 
                    ->where('ShippingAddress' , '=', $shippingFullAddress)
                    ->where('serviceAnswer' , '=', $rating)
                    ->pluck('CustomerID')
                    ->first();

                    DB::table('users')->where('id', $userId)->update(['Customerid' => $customerId]);

            }else{
                $customerId = Auth::user()->customerId;
                ($customerId);
            }

             $date = date("Y-m-d h:i:s");
             
            db::table('tblorder')->insertGetId([
                'CustomerID'=> $customerId,
                'orderDate' => $date,
                'totalOrderPrice' => $total               
            ]); 


            $orderID = DB::table('tblorder')
                ->where('CustomerID', '=', $customerId)
                ->where('orderDate' , '=', $date)
                ->pluck('orderID')
                ->first();
                
                

             foreach ($items->sortBy('id') as $item){

                $productIdTemp = $item->id;
                $productIdTemp = (string)$productIdTemp;
                $size;
                $quantity = $item->quantity;
                $features = array();
                $features[0] = null;
                $features[1] = null;
                $features[2] = null;
                $features[3] = null;

                

                if($productIdTemp[0] == '1'){
                    $size = 'Small';
                    }else if($productIdTemp[0] == '2'){
                        $size = 'Standard';
                    }else if($productIdTemp[0] == '3'){
                        $size = 'Large';
                    }

                if((!($item->id == 1)) && (!($item->id == 2)) || (!($item->id == 3))){
                    $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);
                    
                    while(!(strlen($productIdTemp) == 0)){
                        
                        if($productIdTemp[0] == '6'){
                            $features[0] = 6;
                        }else if($productIdTemp[0] == '7'){
                            $features[1] = 7;
                        }else if($productIdTemp[0] == '8'){
                            $features[2] = 8;
                        }else if($productIdTemp[0] == '9'){
                            $features[3] = 9;
                        }

                        $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);

                    } 
                }

                db::table('tblorderdetails')
                ->insert([
                    'productType'=>  $size,
                    'OrderID'=>  $orderID,
                    'quantity'=>  $quantity,
                    'feature1'=>  $features[0],
                    'feature2'=>  $features[1],
                    'feature3'=>  $features[2],
                    'feature4'=>  $features[3]
                    ]);
                
                   $currentQuantity = db::table('tblproducts')
                    ->where('productType' , '=', $size)
                    ->pluck('unitsinstock')
                    ->first();

                db::table('tblproducts')
                ->where('productType' , '=', $size)
                ->update(['unitsinstock' => $currentQuantity - $quantity]);
                    
            }//end of foreach

            
            Cart::session($userId)->clear();
        
         
         return view('invoice')->with(['address', $address],['state', $state],['city', $city],['zip', $zip], ['orderID', $orderID]);
     
         
         }else
         {
            $items = Cart::getContent();
            $total = Cart::getTotal(); 

                //inserting the new customer
            DB::table('tblcustomer')->insertGetId([
                'LastName'=> $lastName,
                'firstName' => $firstName,
                'billingAddress' => $fullAddress, 
                'phone' => $phone,
                'email' => $email, 
                'ShippingAddress' => $shippingFullAddress,
                'serviceAnswer' => $rating
            ]); 
                //getting cust id
            $customerId = DB::table('tblcustomer')
            ->where('LastName', '=', $lastName)
                ->where('firstName' , '=',$firstName)
                ->where('billingAddress' , '=', $fullAddress) 
                ->where('phone' , '=', $phone)
                ->where( 'email' , '=', $email) 
                ->where('ShippingAddress' , '=', $shippingFullAddress)
                ->where('serviceAnswer' , '=', $rating)
                ->pluck('CustomerID')
                ->first();

                $date = date("Y-m-d h:i:s");
             
            db::table('tblorder')->insertGetId([
                'CustomerID'=> $customerId,
                'orderDate' => $date,
                'totalOrderPrice' => $total               
            ]); 


            $orderID = DB::table('tblorder')
                ->where('CustomerID', '=', $customerId)
                ->where('orderDate' , '=', $date)
                ->pluck('orderID')
                ->first();
                
                

             foreach ($items->sortBy('id') as $item){

                $productIdTemp = $item->id;
                $productIdTemp = (string)$productIdTemp;
                $size;
                $quantity = $item->quantity;
                $features = array();
                $features[0] = null;
                $features[1] = null;
                $features[2] = null;
                $features[3] = null;

                

                if($productIdTemp[0] == '1'){
                    $size = 'Small';
                    }else if($productIdTemp[0] == '2'){
                        $size = 'Standard';
                    }else if($productIdTemp[0] == '3'){
                        $size = 'Large';
                    }

                if((!($item->id == 1)) && (!($item->id == 2)) || (!($item->id == 3))){
                    $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);
                    
                    while(!(strlen($productIdTemp) == 0)){
                        
                        if($productIdTemp[0] == '6'){
                            $features[0] = 6;
                        }else if($productIdTemp[0] == '7'){
                            $features[1] = 7;
                        }else if($productIdTemp[0] == '8'){
                            $features[2] = 8;
                        }else if($productIdTemp[0] == '9'){
                            $features[3] = 9;
                        }

                        $productIdTemp = ltrim($productIdTemp, $productIdTemp[0]);

                    } 
                }

                db::table('tblorderdetails')
                ->insert([
                    'productType'=>  $size,
                    'OrderID'=>  $orderID,
                    'quantity'=>  $quantity,
                    'feature1'=>  $features[0],
                    'feature2'=>  $features[1],
                    'feature3'=>  $features[2],
                    'feature4'=>  $features[3]
                    ]);
                
                   $currentQuantity = db::table('tblproducts')
                    ->where('productType' , '=', $size)
                    ->pluck('unitsinstock')
                    ->first();

                db::table('tblproducts')
                ->where('productType' , '=', $size)
                ->update(['unitsinstock' => $currentQuantity - $quantity]);
                    
            }//end of foreach

            Cart::clear();

            return view('invoice')->with(['address', $address],['state', $state],['city', $city],['zip', $zip], ['orderID', $orderID]);
         }
    }

}