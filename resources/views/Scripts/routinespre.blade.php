<div class="accordion" id="accordionExample">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Rutinas vista previa
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
<?php
                    $data = $_POST['raw'];
                    $cells = preg_split('/\t+/', $data);
                    $cellsCleaned = array();
                    for ($i = 0; $i < count($cells); $i++) {
                        if (strpos($cells[$i], ".com") !== false) {
                            $split  = preg_split('/\r+/', $cells[$i]);
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
                            echo "</table><table border=2 >";
                            echo "<tr><td><b>" . $cellsCleaned[$i] . "</b></td></tr><tr>";

                            $title= false;
                        } else {
                            if (strpos($cellsCleaned[$i], ".com")) {
                                echo "<td>" . $cellsCleaned[$i] . "</td>";
                                echo "</tr><tr>";
                            } else if (strpos($cellsCleaned[$i], "Link") !== false) {
                                echo "<td><b>" . $cellsCleaned[$i] . "</b></td>";
                                echo "</tr><tr>";
                                $title = true;
                            } else {
                                if (strlen(($cellsCleaned[$i]))!=4)
                                    if ($title)
                                        echo "<td>" . $cellsCleaned[$i] . "</td>";
                                    else
                                        echo "<td><b>" . $cellsCleaned[$i] . "</b></td>";
                            }
                        }
                    }
                    echo "<br><br><hr>";
?>


                </div>
            </div>
        </div>
    </div>
    </div>
