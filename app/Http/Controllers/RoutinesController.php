<?php

namespace App\Http\Controllers;

use App\days;
use App\patient;
use App\routines;
use Illuminate\Http\Request;

class RoutinesController extends Controller
{
    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------RETURN VIEWS-----------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------
    public function __construct()
    {
    }
    public function index()
    {
        $patients = patient::orderBy('id', 'DESC')->paginate(10);
        return view('routines.index')->with(compact('patients')); //lista de pacientes

    }
    public function view($id)
    {
        $routines = \DB::SELECT("SELECT routines.id,routines.name, routines.series, routines.repetitions, routines.intensity,routines.rest,routines.link,
    patients.username, days.name AS days, routines.patient_id
    FROM routines
    INNER JOIN patients on routines.patient_id = patients.id
    INNER JOIN days on routines.day_id = days.id
    WHERE patient_id = $id order by routines.day_id");

        return view('routines.routines')->with(compact('routines')); //lista de comidas
    }
    public function massiveView($id)
    {
        $patients = patient::find($id);
        return view('routines.massive', ['id' => $id, 'name' => $patients->username]); //lista de pacientes
    }
    public function getPPatients(Request $request)
    {
        $patients = patient::where('username', 'like', '%' . $request->search . '%')->orWhere('fullname', 'like', '%' . $request->search . '%')->get();
        return view('routines.tableAll_sub')->with(compact('patients'));
    }
    //Devuelve una vista previa de las tablas receta y menus
    public function pre(Request $request)
    {
        return view('Scripts.routinespre')->with(compact('request')); //lista de pacientes
    }
    //Devuelve una vista para asignarle a un paciente un menú ya existente en la base de datos

    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------END OF VIEWS-----------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------DEFAULT METHODS--------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------

    public function destroy($id)
    {
        \DB::delete('delete from routines where patient_id = ?', [$id]);

        return redirect('/rutinas');
    }

    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------END OF DEFAULT METHODS-------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------
    //-------------------------MASIVE METHODS---------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------
    //Devuelve un arreglo con todas las rutinas
    public function routinesProc(String $string)
    {

        $routine = array();
        $day = array();
        $row = array();
        $day_names= array();
        $full = array();
        $data = $string;
        $cells = preg_split('/\t+/', $data);
        $cellsCleaned = array();
        try{
        for ($i = 0; $i < count($cells); $i++) {
            if (strpos($cells[$i], ".com") !== false) {//If its a link
                $split  = preg_split('/\r+/', $cells[$i]); //new column separate by /r /n
                $clean = explode(' ', $split[0]);
                if (isset($clean[1]))
                    array_push($cellsCleaned, $clean[0] . $clean[1]);
                else
                    array_push($cellsCleaned, $clean[0]);
                $tempstr = str_replace($split[0], '', $cells[$i]);
                if (strpos($tempstr, "Día") !== false) {
                    $clean = explode('Ejer', $cells[$i]);
                    array_push($cellsCleaned, str_replace('Ejercicio', '', str_replace($split[0], '', $cells[$i])));
                    array_push($cellsCleaned, str_replace($clean[0], '', $cells[$i]));
                } else
                    array_push($cellsCleaned, str_replace($split[0], '', $cells[$i]));
            } else if (strpos($cells[$i], "Link") !== false) {

                $split  = preg_split('/\n+/', $cells[$i]);
                $clean = explode(' ', $split[0]);
                array_push($cellsCleaned, $clean[0]);
                array_push($cellsCleaned, str_replace($split[0], '', $cells[$i]));
            } else if (strpos($cells[$i], "Día") !== false) {
                $clean = explode('Ejer', $cells[$i]);
                array_push($cellsCleaned, $clean[0]);
                array_push($cellsCleaned, str_replace($clean[0], '', $cells[$i]));
            } else {
                array_push($cellsCleaned, $cells[$i]);
            }
        }
        for ($i = 0; $i < count($cellsCleaned); $i++) {
            if (strpos($cellsCleaned[$i], "Día") !== false) {
                $title = false;
                array_push($day_names,$cellsCleaned[$i]);
                array_push($routine, $day);
                $day = array();
            } else {
                if (strpos($cellsCleaned[$i], ".com")) {
                    array_push($row, $cellsCleaned[$i]);
                    array_push($day, $row);
                    $row = array();
                } else if (strpos($cellsCleaned[$i], "Link") !== false) {
                    $title = true;
                } else {
                    if (strlen(($cellsCleaned[$i])) != 4)
                        if ($title) {
                            array_push($row, $cellsCleaned[$i]);
                        }
                }
            }
        }
        array_push($routine, $day);
        array_shift($routine);
        array_push($full, $day_names);
        array_push($full, $routine);
        return $full;
    }
        catch (\Exception $e){
             return $full;
        }
    }


    //Hace la carga de los datos a la base de datos.
    public function massive2(Request $request, $id)
    {
 try{
        $patient = patient::find($id);
        $patient->save();

        \DB::delete('delete from routines where patient_id = ?', [$id]);
        $routine =  $request->routine;
        $rout = new routines();
        for ($i = 0; $i < count($routine); $i++) {
            $day2 = new days();
            $day2->name="awa";
            $day2->save();
            $day = new days();
            $day = \DB::SELECT("Select id from days order by id DESC limit 1");
            $idDay =  $day[0]->id;
            for ($j = 0; $j < count($routine[$i]); $j++) {


                $rout = new routines();
                $rout->name = $routine[$i][$j][0]." ";
                $rout->series = $routine[$i][$j][1]." ";
                $rout->repetitions = $routine[$i][$j][2]." ";
                $rout->intensity = $routine[$i][$j][3]." ";
                $rout->rest = $routine[$i][$j][4]." ";
                $rout->link = $routine[$i][$j][5]." ";
                $rout->patient_id = $id;
                $rout->day_id = $idDay;
                $rout->save();

            }

        }
        return redirect('/rutinas');
    } catch (\Exception $e) {
        return back()->withErrors('Error de formato despues de:'.$rout->name);
       }
    }
    public function massive(Request $request)
    {

        $patient = patient::find($request->input('patient_id'));
        $patient->save();

        \DB::delete('delete from routines where patient_id = ?', [$request->input('patient_id')]);
        $routinefull =  Self::routinesProc($request->input('raw'));
        $routine=$routinefull[1];
        $names = $routinefull[0];
        $rout = new routines();
        for ($i = 0; $i < count($routine); $i++) {
            $day2 = new days();
            $day2->name=$names[$i];
            $day2->save();
            $day = new days();
            $day = \DB::SELECT("Select id from days order by id DESC limit 1");
            $idDay =  $day[0]->id;
            for ($j = 0; $j < count($routine[$i]); $j++) {
                try {

                $rout = new routines();
                $rout->name = $routine[$i][$j][0];
                $rout->series = $routine[$i][$j][1];
                $rout->repetitions = $routine[$i][$j][2];
                $rout->intensity = $routine[$i][$j][3];
                $rout->rest = $routine[$i][$j][4];
                $rout->link = $routine[$i][$j][5];
                $rout->patient_id = $request->input('patient_id');
                $rout->day_id = $idDay;
                $rout->save();
        } catch (\Exception $e) {
             return back()->withErrors('Error de formato despues de:'.$rout->name);
            }

        }

        }
        return redirect('/rutinas');

    }
    public function massiveEx($idMenu, $idPatient)
    {
        $cata = catalogos::find($idMenu);
        $patient = patient::find($idPatient);
        $patient->description = $cata->description;
        $patient->save();
        \DB::delete('delete from menus where patient_id = ?', [$idPatient]);
        $masterArray =  Self::menusProc($cata->menu);
        for ($i = 0; $i < count($masterArray); $i++) {
            for ($j = 0; $j < 5; $j++) {
                $menuS = new menu();
                $menuS->name = $masterArray[$i][$j] . "";
                $menuS->portion = "2";
                $menuS->patient_id = $idPatient;
                $menuS->day_id = $i + 1;
                $menuS->cat_id = $j + 1;
                $menuS->save();
            }
        }

        //Recetas
        $recipes = Self::recipesProc($cata->recipes);
        for ($i = 0; $i < count($recipes); $i++) {
            $recipesP = new recipes();
            $recipesP->name = $recipes[$i]->name . "";
            $recipesP->ingredients = $recipes[$i]->ingr;
            $recipesP->patient_id = $idPatient;
            $recipesP->procedure = $recipes[$i]->proc;
            $recipesP->save();
        }
        return redirect('/menus');
    }
}
