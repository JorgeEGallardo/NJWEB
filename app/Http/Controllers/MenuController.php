<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\menu;
use App\menuCat;
use App\days;

class MenuController extends Controller
{
    public function index ()
    {
        $patients = patient::all();
        return view('menus.index')->with(compact('patients')); //lista de pacientes
   
    }
    public function menus ($id)
    {
        /* $menú = \BD::SELECT("Select campos from menú inner join pacientes where menú.id_paciente= paciente.id) */
        $menus = \DB::SELECT("SELECT menus.id,menus.name, menus.portion, menus.patient_id, menus.day_id, menus.cat_id, patients.username, days.name AS days, menu_cats.name AS menu_cats 
        FROM menus 
        INNER JOIN patients on menus.patient_id = patients.id
		INNER JOIN days on menus.day_id = days.id
        INNER JOIN menu_cats on menus.cat_id= menu_cats.id
        WHERE patient_id=$id");
        return view('menus.menus')->with(compact('menus')); //lista de comidas
    }
    public function create ()
    {
        $patients = patient::all();
        //$day = days::all();
        //return view('menus.create')->with(compact('day')); //lista de dias
        //return view('menus.create')->with(compact('patients')); //lista de pacientes
      
    /*     $cats =  \DB::SELECT("SELECT patients.username, days.name AS days, menu_cats.name AS menu_cats 
        FROM menus 
        INNER JOIN patients on menus.patient_id = patients.id
		INNER JOIN days on menus.day_id = days.id
        INNER JOIN menu_cats on menus.cat_id= menu_cats.id"); */
        return view('menus.create')->with(compact('patients')); //lista de cats

        return view('menus.create'); //formulario de comidas
    }
    public function store (Request $request)
    {
        //guardar datos
        //dd($request->all());
        $menu = new menu ();
        $menu -> name = $request->input('name');
        $menu -> portion = $request->input('portion');
        $menu -> patient_id = $request->input('patient_id');
        $menu -> day_id = $request->input('day_id');
        $menu -> cat_id = $request->input('cat_id');
        $menu -> save();

        return redirect('/menus');
    }   
    public function edit ($id)
    {   
        //return "mostrar aqui el menu con id $id";
        $menu= menu::find($id);
        $patients = patient::all();
        return view('menus.edit')->with(compact('patients','menu')); //lista de cats

        //return view('menus.edit'); //formulario de comidas
    }
    public function update (Request $request, $id)
    {
        //guardar datos
        //dd($request->all());
        $menu = menu::find($id);
        $menu -> name = $request->input('name');
        $menu -> portion = $request->input('portion');
        //$menu -> patient_id = $request->input('patient_id');
        $menu -> day_id = $request->input('day_id');
        $menu -> cat_id = $request->input('cat_id');
        $menu -> save();

        return redirect('/menus');
    }  
    public function destroy ($id)
    {
        $menu = menu::find($id);
        $menu -> delete();

        return back();
    }  
    

}
