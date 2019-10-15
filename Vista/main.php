<?php
    session_start();
    switch ($_SESSION['rol']) {
        case 'Administrador':
            require 'v/admin.php';    
        break;    
        case 'Archivista':    
            require 'v/archivista.php';    
        break;    
        case 'Alguacil':    
            require 'v/alguacil.php';   
        break;    
        case 'Jefe de archivo':    
            require 'v/archivista.php';        
        break;    
        case 'Juez':    
            require 'v/juez.php';             

        break;
        default:
            header('Location: login2.php');
         break;

        }
?>