<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Depth Search</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php
class Graph 
{
    protected $_len = 0;
    protected $_g = array();
    protected $_visited = array();
    protected $_backward = array();
 
    public function __construct()
    {
        // Creating the cities with their connected neighboors
        // Matrix 10 x 10
        $this->_g = array(              
            array(0, 0, 0, 1, 0, 0, 0, 0, 0, 1), 	// sadat
            array(0, 0, 1, 0, 0, 0, 0, 0, 0, 0),	// Bagoor
            array(0, 1, 0, 1, 0, 0, 0, 0, 0, 0), 	// Cers
            array(1, 0, 1, 0, 1, 1, 0, 0, 0, 0),	// Menouf
            array(0, 0, 0, 1, 0, 0, 0, 0, 0, 0),	// Shohada
            array(0, 0, 0, 1, 0, 0, 1, 1, 1, 0),	// Sheben
            array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0),	// Tala
            array(0, 0, 0, 0, 0, 1, 0, 0, 1, 0),	// Sab3
            array(0, 0, 0, 0, 0, 1, 0, 1, 0, 0),	// Quesna
            array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0)		// Ashmoun
        );

 
        $this->_len = count($this->_g);
 
        $this->_initVisited();
    }
    
    // Creating an Array and make all its values equal Zero at the first
    protected function _initVisited()
    {
        for ($i = 0; $i < $this->_len; $i++) {
            $this->_visited[$i] = 0;
        }
    }


 
    public function depthFirst($source,$dest)
    {
        $this->_visited[$source] = 1;       //mark the visited city
        if(!in_array($source, $this->_backward)){
            array_push($this->_backward, $source);
        }
 		switch($source){                    // Convert the city index into a Name
 			case 0 :
	 			echo "<span class='city'>sadat</span>";
	 			break;
	 		case 1 :
	 			echo "<span class='city'>Bagoor</span>";
	 			break;
	 		case 2 :
	 			echo "<span class='city'>Cers</span>" ;
	 			break;
	 		case 3 :
	 			echo "<span class='city'>Menouf</span>";
	 			break;
	 		case 4 :
	 			echo "<span class='city'>Shohada</span>";
	 			break;
	 		case 5 :
	 			echo "<span class='city'>Sheben</span>";
	 			break;
	 		case 6 :
	 			echo "<span class='city'>Tala</span>";
	 			break;
	 		case 7 :
	 			echo "<span class='city'>Berket Elsab3</span> ";
	 			break;
	 		case 8 :
	 			echo "<span class='city'>Quesna</span>";
	 			break;
	 		case 9 :
	 			echo "<span class='city'>Ashmoun</span>";
	 			break;									
 		}

        if($source == $dest){ 
            echo "<h3>Distination Found</h3>" ;         //checking the Destination
    		die();
        }
        // looping through the Cities array 
        for ($i = 0; $i < $this->_len; $i++) {
            // checking each source or new source city that it's not visited before
            if ($this->_g[$source][$i] == 1 && !$this->_visited[$i]) { 
                $this->depthFirst($i,$dest);    // go back to set new source city
            }
        }
        // var_dump($this->_backward)."<br>";
        array_pop($this->_backward)."<br>";
        // var_dump($this->_backward)."<br>";
        $s = count($this->_backward);
        $so = $this->_backward[$s-1];
        $this->depthFirst($so,$dest);
    }
}
 

if(isset($_POST['send'])){
    if($_POST['search'] == 1){
        $g = new Graph();
        $g->depthFirst($_POST['source'],$_POST['dest']);
    } elseif($_POST['search'] == 2) {
        require_once 'breadth.php';
    } elseif($_POST['search'] == 3){
        require_once 'a2.php';
    }
}
?>


        <div class="form">
            <form method="post">
                <!-- <span>Source :</span>  -->
                <select name="source">
                    <option disabled="disabled" selected="selected">Source City</option>
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
                <!-- <span>Destination :</span>  -->
                <select name="dest" placeholder="ss">
                    <option disabled="disabled" selected="selected">Distination City</option>
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

                <select name="search">
                    <option disabled="disabled" selected="selected" value="0">Search Type</option>
                    <option value="1">Depth</option>
                    <option value="2">Beadth</option>
                    <option value="3">Greedy</option>
                    <option value="4">A*</option>
                    
                </select>

                <input type="submit" name="send">
            </form>
        </div>
        <div class="result">

        </div>
        <div>
            <img src='map.png'>
        </div>
    </body>
</html>