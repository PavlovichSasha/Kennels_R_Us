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
            if(!empty($_POST['q']))
                $case = ($_POST['q']);
        } else {
            $case = 1;
        }
        switch($case) {
            case 1:
            $tableName = 'products';
            $results = DB::table($tableName)
            ->get();
            return view('/reports', compact('results'));
            break;

            case 2:
            $tableName = 'tblfeatures';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;

            case 3:
            $tableName = 'tblorder';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;

            case 4:
            $tableName = 'tblcustomer';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;

            case 5:
            $tableName = 'users';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;


            case 6:
            $tableName = 'tblfeaturedetails';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;

            case 7:
            $tableName = 'tblorderdetails';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
            break;

            default:
            $tableName = 'tblcustomer';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view('/reports', compact('results'));
        }

    }
}