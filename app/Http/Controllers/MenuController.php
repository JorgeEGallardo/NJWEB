<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patients;

class MenuController extends Controller
{
    public function index ()
    {
        $patient = Patients::all();
        return view('menus.index')->with(compact('patient')); //lista de pacientes
    }
    public function menus ()
    {
        return view('menus.menus'); //lista de comidas
    }
    public function create ()
    {
        return view('menus.create'); //formulario de comidas
    }
    public function store ()
    {

    }   
}
