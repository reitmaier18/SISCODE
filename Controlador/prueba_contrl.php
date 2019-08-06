<?php
     session_start();
     require '../Modelo/cnx.php';
     $db = new db();
     $db->_construct();
     $sql = ("select estado from sisco.estado");
     $query = pg_query($sql);
     echo "<option disabled selected>Estados</option>";    
     while ($row = pg_fetch_row($query)) {
        echo "<option value=$row[0]>$row[0]</option>";    
     }
     
?>