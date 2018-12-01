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
            $tableName = 'tblcustomer';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
            break;

            case 2:
            $tableName = 'tblfeatures';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
            break;

            case 3:
            $tableName = 'tblorder';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
            break;

            case 4:
            $tableName = 'tblproducts';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
            break;

            case 5:
            $tableName = 'tblusers';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
            break;

            default:
            $tableName = 'tblcustomer';
            $results = DB::table($tableName)
            ->select('*')
            ->get();
            return view::make('/reports')->with(array($results));
        }

    }
}