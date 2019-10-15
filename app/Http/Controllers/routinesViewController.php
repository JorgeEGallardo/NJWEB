<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
class routinesViewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function viewM(){
        $routines = DB::select('select * from patients', [1]);
        return view('routines')->with("routines", $routines);
}
public function viewP(Request $request){
    $routines = DB::select('select * from patients', [1]);
    return view('routines')->with("", $routines);
}
public function generatePDF()
{
    $routines = DB::select('select * from patients', [1]);
    $data = ['title' => 'Welcome to HDTuto.com',
            'routines' => $routines];
    $pdf = PDF::loadView('routines', $data);

    return $pdf->download('itsolutionstuff.pdf');
}
}
