<?php

$g = array(
    0 => array(0, 0, 0, 1, 0, 0, 0, 0, 0, 1),    // sadat
    1 => array(0, 0, 1, 0, 0, 0, 0, 0, 0, 0),    // Bagoor
    2 => array(0, 1, 0, 1, 0, 0, 0, 0, 0, 0),    // Cers
    3 => array(1, 0, 1, 0, 1, 1, 0, 0, 0, 0),    // Menouf
    4 => array(0, 0, 0, 1, 0, 0, 0, 0, 0, 0),    // Shohada
    5 => array(0, 0, 0, 1, 0, 0, 1, 1, 1, 0),    // Sheben
    6 => array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0),    // Tala
    7 => array(0, 0, 0, 0, 0, 1, 0, 0, 1, 0),    // Sab3
    8 => array(0, 0, 0, 0, 0, 1, 0, 1, 0, 0),    // Quesna
    9 => array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0)     // Ashmoun
);
 
function init(&$visited, &$graph)
{
    foreach ($graph as $key => $vertex) {
        $visited[$key] = 0;
    }
}
 
function breadth_first($graph, $start, $visited,$end)
{
    // create an empty queue
    $q = array();
 
    // initially enqueue only the starting vertex
    array_push($q, $start);
    $visited[$start] = 1;
    echo "<span class='city'>" . getName($start) ."</span>";
 
    while (count($q)) {
        $t = array_shift($q);
        foreach ($graph[$t] as $key => $vertex) {    // searching inside the city array
            if (!$visited[$key] && $vertex == 1) {   // checking if it has a connection with it.
                $visited[$key] = 1;                  // mark it as visited
                array_push($q, $key);                // insert it into the queue
                echo "<span class='city'>" . getName($key) ."</span>";
                if($key == $end){
                    echo "<h3>Distination Found</h3>";          //checking the Destination
                     die();
                }
            }
        }
    }
}
function getName($source){
    switch($source){                    // Convert the city index into a Name
        case 0 :
            return "sadat";
            break;
        case 1 :
            return "Bagoor";
            break;
        case 2 :
            return "Cers";
            break;
        case 3 :
            return "Menouf";
            break;
        case 4 :
            return "Shohada";
            break;
        case 5 :
            return "Sheben";
            break;
        case 6 :
            return "Tala";
            break;
        case 7 :
            return "Berket Elsab3";
            break;
        case 8 :
            return "Quesna";
            break;
        case 9 :
            return "Ashmoun";
            break;                                  
    }
}
if(isset($_POST['send'])){
     $visited = array();
    init($visited, $g);
    breadth_first($g, $_POST['source'], $visited, $_POST['dest']);
}


?>
<!-- <form method="post">
    Source : 
    <select name="source">
        <option value="0">Sadat</option>
        <option value="1">Bagoor</option>
        <option value="2">Cers</option>
        <option value="3">Menouf</option>
        <option value="4">Shohada</option>
        <option value="5">Sheben</option>
        <option value="6">Tala</option>
        <option value="7">Sab3</option>
        <option value="8">Quesna</option>
        <option value="9">Ashmoun</option>
    </select>
    Destination : 
    <select name="dest">
        <option value="0">Sadat</option>
        <option value="1">Bagoor</option>
        <option value="2">Cers</option>
        <option value="3">Menouf</option>
        <option value="4">Shohada</option>
        <option value="5">Sheben</option>
        <option value="6">Tala</option>
        <option value="7">Sab3</option>
        <option value="8">Quesna</option>
        <option value="9">Ashmoun</option>
    </select>

    <input type="submit" name="send">
</form> -->