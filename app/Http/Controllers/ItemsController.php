<?php

namespace App\Http\Controllers;


use App\Imports\Import;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ItemsController extends Controller
{
    public function index()
    {
        return view('items/index');
    }

    public function import(Request $request)
    {

        if($request->has('file')) {
            $path1 = $request->file('file')->store('temp');
            $path  = storage_path('app').'/'.$path1;
            Excel::import(new Import,$path);

            return back()->with('success', 'Importação feita com sucesso');
        }

    }
}
