<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $data = $expediente->consultar_pieza($_POST['value']);
    //var_dump($data);
    for ($i=0; $i < count($data); $i++) { 
    	echo "<tr>";
    	echo "<td>".$data[$i][0]."</td>";
    	echo "<td>".$data[$i][1]."</td>";
    	echo "</tr>";
    }
?>
