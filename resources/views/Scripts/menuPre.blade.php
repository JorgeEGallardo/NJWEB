<div class="accordion" id="accordionExample">
    <?php
$raw = $_POST['rec'];
if ($raw != ""){?>
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Recetas vista previa
          </button>
        </h2>
      </div>

      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <?php
class recipe
{
   public $name;
   public $ingr;
   public $proc;
}
$raw = $_POST['rec'];
$menu = preg_split('/\n+/', $raw); //Separamos el $raw en palabras.
$proc = false;
$isFirst = true;
$recipes = array();
$name = "";
$ingr = "";
$isProc = false;
for ($i = 0; $i < (count($menu) - 1); $i++) {
   if (strpos($menu[$i + 1], "Ingredient") !== false) {
      if ($isFirst) {
         $isFirst = false;
      } else {
         $recipe = new recipe();
         $recipe->name = $name;
         $recipe->ingr = $ingr;
         $recipe->proc = $proc;
         $name = "";
         $proc = "";
         $ingr = "";
         array_push($recipes, $recipe);
      }
      $name = $menu[$i];
      $isProc = false;
   } else if (strpos(strtolower($menu[$i]), "prepar") !== false || strpos(strtolower($menu[$i]), "elaboraci") !== false) {
      $isProc = true;
   } else {
      if ($isProc)
         $proc = $proc . $menu[$i] . " ";
      else
         $ingr = $ingr . $menu[$i] . " ";
   }
}
$recipe = new recipe();
$recipe->name = $name;
$recipe->ingr = $ingr;
$recipe->proc = $proc;

array_push($recipes, $recipe);
echo "<table class='table'>";
foreach ($recipes as $recipe) {
   echo "<tr><td>" . $recipe->proc . "</td></tr>";
}
echo "</table>";
?>
        </div>
      </div>
    </div>
    <?php
$raw = "";
$raw = $_POST['raw'];
}if ($raw != ""){
?>
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Menus vista previa
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
<?php

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
}
?>
</div>
</div>
</div>
</div></div>
