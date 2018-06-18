<?php
        
    if(isset($_GET['inicio'])){    
        $inicio = $_GET['inicio'];
        }
    else{
            $inicio = 1;
        }
   
    //conta para transforma o numero do link em numero de registros por pagina        
    $limit_inicio = ($inicio-1) * $lmt;

    //carregar classe PDO
    require_once("pdo.php");
    
    //Instanciar uma conexão
    $conn = new Conexao();
    
?>