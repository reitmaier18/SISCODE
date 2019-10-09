<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $data = $expediente->consultar_pieza($_POST['value']);
    for ($i=0; $i < count($data); $i++) { 
    	echo "<tr>";
    	echo "<td>".$data[$i]['numero_pieza']."</td>";
    	echo "<td>".$data[$i]['ubicacion']."</td>";
        echo "<td class='oc'>".$data[$i]['id']."</td>";
        echo "<td><center><img src='img/icon7.png' id='edit' onclick='update_pieza_modal();' title='Editar'></center></td>";
    	echo "</tr>";
    }
    
?>
