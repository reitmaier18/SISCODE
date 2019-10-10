<?php 
	session_start();
    require '../Modelo/cnx.php';
    require '../Modelo/expediente.php';
    $db = new db();
    $db->_construct();
    $expediente = new expediente();
    $option=@$_GET['option'];
    $data = $expediente->consultar_pieza($_POST['expe']);
    //echo $_GET['option'];
    if ($option==NULL) {
        for ($i=0; $i < count($data); $i++) { 
            echo "<tr>";
            echo "<td>".$data[$i]['numero_pieza']."</td>";
            echo "<td>".$data[$i]['ubicacion']."</td>";
            echo "<td class='oc'>".$data[$i]['id']."</td>";
            echo "<td><center><img src='img/icon7.png' id='edit' onclick='update_pieza_modal();' title='Editar'></center></td>";
            echo "</tr>";
        }
    }else{
        //echo 'aqui estoy';
        //echo json_encode($data);
        
        echo "<option disabled selected>Pieza</option>";
        for ($i=0; $i < count($data); $i++) { 
            echo "<option value='$data[$i]['numero_pieza']'>".$data[$i]['numero_pieza']."</option>";
        }
        
    }
    
    
?>
