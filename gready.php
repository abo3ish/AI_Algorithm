<?php
class Greedy 
{
    protected $_len = 0;
    protected $_distance = array();
    protected $_g = array();
    protected $_d = array();
    protected $_visited = array();
    protected $_backward = array();
 
    public function __construct()
    {
        // Creating the cities with their connected neighboors
        // Matrix 10 x 10
        $this->_g = array(              
            array(0, 0, 0, 1, 0, 0, 0, 0, 0, 1),    // sadat
            array(0, 0, 1, 0, 0, 0, 0, 0, 0, 0),    // Bagoor
            array(0, 1, 0, 1, 0, 0, 0, 0, 0, 0),    // Cers
            array(1, 0, 1, 0, 1, 1, 0, 0, 0, 0),    // Menouf
            array(0, 0, 0, 1, 0, 0, 0, 0, 0, 0),    // Shohada
            array(0, 0, 0, 1, 0, 0, 1, 1, 1, 0),    // Sheben
            array(0, 0, 0, 0, 0, 1, 0, 0, 0, 0),    // Tala
            array(0, 0, 0, 0, 0, 1, 0, 0, 1, 0),    // Sab3
            array(0, 0, 0, 0, 0, 1, 0, 1, 0, 0),    // Quesna
            array(1, 0, 0, 0, 0, 0, 0, 0, 0, 0)     // Ashmoun
        );
        $this->_d = array(
            //    Sadat     Bagoor  Cers    Menouf  Shohada  Sheben tala   Sab3    quesna  ashmoun
            array(0,        70.6,   62.6,   57.7,   78.9,   67.5,   77.5,   82,     87.7,   75),     // sadat
            array(70.6,     0,      8.3,    17.1,   16.4,   16.2,   31.9,   29.2,   33.7,   21),    // Bagoor
            array(62.6,     8.3,    0,      7.2,    27.1,   16.2,   31.5,   30.1,   32.5,   22.2),    // Cers
            array(57.7,     17.1,   7.2,    0,      22.8,   17.9,   32,     31.6,   33.7,   24.1),    // Menouf
            array(78.9,     30.7,   27.1,   22.8,   0,      14.3,   13.7,   28.9,   30.8,   41.6),  // Shohada
            array(67.5,     16.2,   16.2,   17.9,   14.3,   0,      16.3,   15.2,   18.3,   39.1),    // Shebin
            array(77.5,     31.9,   31.5,   23,     13.7,   16.3,   0,      19.7,   32.8,   56.5),    // Tala
            array(82,       29.2,   30.1,   31.6,   28.9,   14.3,   19.7,   0,      17.1,   51.5),    // Sab3
            array(87.7,     33.7,   32.5,   33.7,   30.8,   18.3,   32.8,   17.1,   0,      50.1),    // Quesna
            array(75,       21,     22.2,   24.1,   41.6,   39.1,   56.5,   51.5,   50.1,   0)     // Ashmoun    

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
    public function clear(){
        for($i=0;$i<count($this->_distance)+1;$i++){
            array_pop($this->_distance);

        }
    }

 
    public function gready($source,$dest)
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
                echo "<span class='city'>Cers</span>";
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
                echo "<span class='city'>Berket Elsab3</span>";
                break;
            case 8 :
                echo "<span class='city'>Quesna</span>";
                break;
            case 9 :
                echo "<span class='city'>Ashmoun</span>" ;
                break;                                  
        }

        if($source == $dest){ 
            echo "<span class='city'>Distination Found</h3>";          //checking the Destination
            die();
        }
        // looping through the Cities array 
        for ($i = 0; $i < $this->_len; $i++) {
            // checking each source or new source city that it's not visited before
            if ($this->_g[$source][$i] == 1 && !$this->_visited[$i]) { 
                array_push($this->_distance, $this->_d[$dest][$i]);   
            }

        }
        

        
        if(!empty($this->_distance)){
            sort($this->_distance,SORT_NUMERIC);
            $key = array_search($this->_distance[0], $this->_d[$dest]);

            $this->clear();
            $this->gready($key,$dest);

        } else {
            array_pop($this->_backward)."<br>";
            $s = count($this->_backward);
            $so = $this->_backward[$s-1];
            $this->gready($so,$dest);
        }
    }
}

if(isset($_POST['send'])){
    $g = new Greedy();
    $g->gready($_POST['source'],$_POST['dest']);
}
?>

<form method="post">
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
</form>
