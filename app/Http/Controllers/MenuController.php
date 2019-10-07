<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\menu;
use App\menuCat;
use App\days;

class MenuController extends Controller
{
    public function index()
    {
        $patients = patient::orderBy('id', 'DESC')->get();
        return view('menus.index')->with(compact('patients')); //lista de pacientes

    }
    public function menus($id)
    {
        /* $menú = \BD::SELECT("Select campos from menú inner join pacientes where menú.id_paciente= paciente.id) */
        $menus = \DB::SELECT("SELECT menus.id,menus.name, menus.portion, menus.patient_id, menus.day_id, menus.cat_id, patients.username, days.name AS days, menu_cats.name AS menu_cats
        FROM menus
        INNER JOIN patients on menus.patient_id = patients.id
		INNER JOIN days on menus.day_id = days.id
        INNER JOIN menu_cats on menus.cat_id= menu_cats.id

        WHERE patient_id = $id order by menus.day_id, menus.cat_id");

        return view('menus.menus')->with(compact('menus')); //lista de comidas
    }
    public function massiveView()
    {

        $patients = patient::all();
        return view('menus.massive')->with(compact('patients')); //lista de pacientes
    }
    public function create()
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
    public function massive(Request $request)
    {
        $raw = $request->input('raw');

        $menu = array(); //Aqui se va a guardar $raw separado por palabras.
        $day = array(); //Aqui van todas las comidas guardadas por dia.
        $tempArray = array(); //Array temporal para separar las comidas de un mismo dia.
        $mealList = array("Desayuno:", "Colación:", "Comida:", "Colación:", "Cena:", "owo"); //Lista de las comidas que tiene un dia ,a lista debe terminar con una palabra que no exista.
        $dayCount = 1; //Dia que estamos buscando (1-15).
        $temp = ""; //String antes de ser pusheado a un arrray.
        $filter = ""; // Filtro para sacar las palabras no deseadas.
        $masterArray = array(); //Aqui va todo ya ordenado.
        $mealsArray = array(); //Comidas ya ordenadas listas para ser cargadas  al master.

        $menu = preg_split('/\s+/', $raw); //Separamos el $raw en palabras.

        //Separamos las comidas por día buscando la cadena "Día (número de día)"
        for ($i = 0; $i < count($menu); $i++) {
            if ($menu[$i] == "Día" && $menu[$i + 1] == $dayCount) {
                $filter = "Día " . ($dayCount - 1);
                $temp = str_replace($filter, "", $temp);
                array_push($day, $temp);
                $dayCount++;
                $temp = "";
            }
            $temp = $temp . " " . $menu[$i];
        }

        $filter = "Día " . ($dayCount - 1);
        $temp = str_replace($filter, "", $temp);
        array_push($day, $temp);


        //Separamos las comidas del día por su categoria (Desayuno:, Comida:, etc.)
        for ($i = 1; $i < count($day); $i++) {
            $tempArray =  preg_split('/\s+/', $day[$i]);
            $temp = "";
            $currentMeal = 0;
            $mealsArray = array();
            for ($j = 0; $j < count($tempArray); $j++) {
                if ($tempArray[$j] == $mealList[$currentMeal]) {
                    array_push($mealsArray, $temp);
                    $temp = "";
                    $j++;
                    $currentMeal++;
                }
                $temp = $temp . " " . $tempArray[$j];
            }
            //Push al arreglo maestro
            array_push($mealsArray, $temp);
            array_shift($mealsArray);
            array_push($masterArray, $mealsArray);
        }
        //Imprimimos todo el arreglo
        /*for ($i = 0; $i < count($masterArray); $i++) {
            echo "Dia " . ($i + 1) . ":<br>";
            for ($j = 0; $j < 5; $j++)
                echo $mealList[$j] . " " . $masterArray[$i][$j] . "<br>";
        }*/
        for ($i = 0; $i < count($masterArray); $i++) {
            for ($j = 0; $j < 5; $j++) {
                $menuS = new menu();
                $menuS->name = $masterArray[$i][$j] . "";
                $menuS->portion = "2";
                $menuS->patient_id = $request->input('patient_id');
                $menuS->day_id = $i + 1;
                $menuS->cat_id = $j + 1;
                $menuS->save();
            }
        }

        return redirect('/menus');
    }
    public function store(Request $request)
    {
        //guardar datos
        //dd($request->all());
        $menu = new menu();
        $menu->name = $request->input('name');
        $menu->portion = $request->input('portion');
        $menu->patient_id = $request->input('patient_id');
        $menu->day_id = $request->input('day_id');
        $menu->cat_id = $request->input('cat_id');
        $menu->save();

        return redirect('/menus');
    }
    public function edit($id)
    {
        //return "mostrar aqui el menu con id $id";
        $menu = menu::find($id);
        $patients = patient::all();
        return view('menus.edit')->with(compact('patients', 'menu')); //lista de cats

        //return view('menus.edit'); //formulario de comidas
    }
    public function update(Request $request, $id)
    {
        //guardar datos
        //dd($request->all());
        $menu = menu::find($id);
        $menu->name = $request->input('name');
        $menu->portion = $request->input('portion');
        //$menu -> patient_id = $request->input('patient_id');
        $menu->day_id = $request->input('day_id');
        $menu->cat_id = $request->input('cat_id');
        $menu->save();

        return redirect('/menus');
    }
    public function destroy($id)
    {
        $menu = menu::find($id);
        $menu->delete();

        return back();
    }
}
