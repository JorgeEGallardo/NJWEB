<div class="accordion" style="width:145%; margin-left:-25%" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Rutinas vista previa
                </button>
            </h2>
        </div>
<style>
input{
    width:100%;
    background-color: transparent;
    border: 0px solid;
    height: 1em
}
</style>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body" style="width                :100%">
                <?php
//rint_r(json_encode($_POST['raw']));
                $routine = array();
                $day = array();
                $row = array();
                $day_names = array();
                $full = array();
                $data = $_POST['raw'];
                $cells = preg_split('/\t+/', $data);
                $cellsCleaned = array();

                for ($i = 0; $i < count($cells); $i++) {
                    if (strpos($cells[$i], ".com") !== false) { //If its a link
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
                        array_push($day_names, $cellsCleaned[$i]);
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

                $routinefull = $full;
                $routine = $routinefull[1];
                $names = $routinefull[0];

                echo "<input class='btn btn-success' style='margin-bottom:3em;margin-left:25%;width:50%;height:4em' type='submit'>";
                for ($i = 0; $i < count($routine); $i++) {


                    echo "<table STYLE='border:solid 0.1em; width:100%;margin-top:1.5rem'>";
                    for ($j = 0; $j < count($routine[$i]); $j++) {
                        echo "<tr>";
                        echo "<td style='width:32%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][0] . "'></td>";
                        echo "<td style='width:6%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][1] . "'></td>";
                        echo "<td style='width:12%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][2] . "'></td>";
                        echo "<td style='width:6%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][3] . "'></td>";
                        echo "<td style='width:8%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][4] . "'></td>";
                        echo "<td style='width:24%'> <input name='routine[$i][$j][]' value='" . $routine[$i][$j][5] . "'></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                ?>


            </div>
        </div>
    </div>
</div>
</div>
