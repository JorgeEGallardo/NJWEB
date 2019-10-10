<?php

$raw = $_POST['raw'];

$menu = array(); //Aqui se va a guardar $raw separado por palabras.
$day = array(); //Aqui van todas las comidas guardadas por dia.
$tempArray = array(); //Array temporal para separar las comidas de un mismo dia.
$mealList = array("Desayuno:", "Colación:", "Comida:", "Colación:", "Cena:", "owo"); //Lista de las comidas que tiene un dia ,a lista debe terminar con una palabra que no exista.
$dayCount = 1;//Dia que estamos buscando (1-15).
$temp = ""; //String antes de ser pusheado a un arrray.
$filter = ""; // Filtro para sacar las palabras no deseadas.
$masterArray = array(); //Aqui va todo ya ordenado.
$mealsArray = array(); //Comidas ya ordenadas listas para ser cargadas  al master.

$menu = preg_split('/\s+/', $raw);//Separamos el $raw en palabras.

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
for ($i = 0; $i < count($masterArray); $i++) {
    echo "<table class='table table-striped'><thead style='width:100%' class ='thead-dark'><tr style='width:100%'><th>Dia " . ($i + 1) . "</thead></th></tr>";
    for ($j = 0; $j < 5; $j++)
        echo "<tr><td>".$mealList[$j] . "</td><td> " . $masterArray[$i][$j] . "</td></tr>";
    echo "</table>";
}
