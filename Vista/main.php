<?php
    session_start();
    switch ($_SESSION['rol']) {
        case 'Administrador':
            require 'view/admin.php';    
        break;    
        case 'Archivista':    
            require 'view/archivista.php';    
        break;    
        case 'Alguacil':    
            require 'view/alguacil.php';   
        break;    
        case 'Jefe de archivo':    
            require 'view/archivista.php';        
        break;    
        case 'Juez':    
            require 'view/juez.php';             

        break;
        default:
            header('Location: login2.php');
         break;

        }
?>