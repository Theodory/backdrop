<?php

namespace App\Http\Controllers;

use App\Imports\CountryImport;
use App\Rules\FileRule;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'file' => ['required',new FileRule($request->file('file'))]
        ]);

        Excel::import(new CountryImport,request()->file('file'));

        return back()->with('success','File uploaded successfully, please wait while importing on the background.');
    }
}
