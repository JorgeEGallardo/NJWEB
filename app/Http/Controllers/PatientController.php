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
        return view('patients.index')->with(compact('patients'));

    }
    public function view($id)
    {
        $data = \DB::SELECT("SELECT * FROM patients WHERE id = ?", [$id]);
        return view('patients.patient')->with(compact('data')); 
    }
    public function create()
    {
        $patient = patient::all();
        return view('patients.create')->with(compact('patient'));
    }

    public function atachIndex($id)
    {
        $user = \DB::SELECT("SELECT * FROM patients WHERE id = ?", [$id]);
        $fullname = $user[0]->fullname;
        $images = \DB::select('select * from images where auth_by  = ?', [$id]);
        $documents = \DB::select('select * from documents where auth_by  = ?', [$id]);
        $domain = 'https://adara5.s3.us-east-2.amazonaws.com/';
        return view('patients.atach', ['id' => $id, 'domain' => $domain, 'name' => $fullname])->with(compact(['images', 'documents']));
    }


    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------DEFAULT METHODS--------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------


    public function store(Request $request)
    {
        

        $val = \DB::SELECT("SELECT * FROM patients WHERE username = ?", [ $request->input('username')]);
        

        if($val){ 

            $alert = "El nombre de usuario esta en uso";
            echo "<script type='text/javascript'>
            danger(); 
            function danger() {
                alert('$alert');
                location.replace('/patient/add')
              }
            </script>";
        }   else {
           $patient = new patient();
            $patient->username = $request->input('username');
            $patient->password = \Hash::make($request->input('password'));
            $patient->fullname = $request->input('name');
            $patient->note = $request->input('note');
            $patient->save();

            return redirect('/patient');
        }
        
        
    }
    public function edit($id)
    {
        $patient = patient::find($id);
        return view('patients.edit')->with(compact('patient'));

    }
    public function update(Request $request, $id)
    {
     $patient = patient::find($id);
        $val = \DB::SELECT("SELECT * FROM patients WHERE username = ? AND username <> ?", [ $request->input('username'),$patient->username] );

        if($val){
            $alert = "El nombre de usuario esta en uso";
            echo "<script type='text/javascript'>
            danger();
            function danger() {
                alert('$alert');
                location.replace('/patient/$id/edit')
              }
            </script>";
        } else{
            $patient = patient::find($id);
            $patient->username = $request->input('username');
            $patient->password = \Hash::make($request->input('password'));
            $patient->fullname = $request->input('name');
            $patient->note = $request->input('note');
            $patient->description = $request->input('description');
            $patient->save();

            return redirect('/patient');
        }

    }
    public function destroy($id)
    {
        \DB::delete('delete from patients where id = ?', [$id]);

        return redirect('/patient');
    }
}
