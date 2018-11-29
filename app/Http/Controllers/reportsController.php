<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class reportsController extends Controller {

    public function reportsTables(Request $request){
        if(!empty($_GET['q'])){
            $case = ($_GET['q']);
        } else {
            $case = 1;
        }
        switch($case) {
            case 1:
            $tableName = 'tblcustomer';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
            break;

            case 2:
            $tableName = 'tblfeatures';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
            break;

            case 3:
            $tableName = 'tblorder';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
            break;

            case 4:
            $tableName = 'tblproducts';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
            break;

            case 5:
            $tableName = 'tblusers';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
            break;

            default:
            $tableName = 'tblcustomer';
            $data = DB::table($tableName)->get();
            return view('reports')->with($data);
        }

    }
}