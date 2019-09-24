<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class routinesViewController extends Controller
{
    public function viewM(){
        $routines = DB::select('select * from patients', [1]);
        return view('routines')->with("routines", $routines);
}
}
