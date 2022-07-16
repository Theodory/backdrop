<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Record;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        // $data = Country::ageRate()
        // ->orderBy('name','asc')
        // ->first();
        // dd($data);

        if ($request->ajax()) {
            // $data = DB::table('countries')
            // ->join('records','records.country_id','countries.id')
            //          ->select('countries.id','name','code',DB::raw('round(AVG(life_expectancy),0) as age'))
            //          ->groupBy('records.country_id')
            //         ;
            $data = Country::ageRate();
            return DataTables::of($data)->addIndexColumn()
                ->make(true);
        }
        return view('welcome');
    }

    public function dashboard(){
        
        return view('dashboard');
    }
}
