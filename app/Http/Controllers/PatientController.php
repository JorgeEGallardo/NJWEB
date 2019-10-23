<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
class PatientController extends Controller
{

    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------RETURN VIEWS-----------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $patients = patient::orderBy('id', 'DESC')->paginate(10);
        return view('patients.index')->with(compact('patients')); //lista de pacientes

    }
    public function view($id)
    {
        $data = \DB::SELECT("SELECT * FROM patients WHERE id = ?", [$id]);
        return view('patients.patient')->with(compact('data')); //lista de comidas
    }
    public function create()
    {
        $patient = patient::all();
        return view('patients.create')->with(compact('patient')); //lista de cats
    }

    public function atachIndex($id)
    {
        return view('patients.atach', ['id'=> $id]);
    }
    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------DEFAULT METHODS--------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------


    public function store(Request $request)
    {
        //guardar datos
        $patient = new patient();
        $patient->username = $request->input('username');
        $patient->password = $request->input('password');
        $patient->fullname = $request->input('name');
        $patient->save();

        return redirect('/patient');
    }
    public function edit($id)
    {
        //return "mostrar aqui el paciente con id $id";
        $patient = patient::find($id);
        return view('patients.edit')->with(compact('patient')); //lista de cats

        //return view('menus.edit'); //formulario de comidas
    }
    public function update(Request $request, $id)
    {
        $patient = patient::find($id);
        $patient->username = $request->input('username');
        $patient->password = $request->input('password');
        $patient->fullname = $request->input('name');
        $patient->save();

        return redirect('/patient');
    }
    public function destroy($id)
    {
        \DB::delete('delete from patients where id = ?', [$id]);

        return redirect('/patient');
    }
}
