<?php
    $dsn = 'mysql:host=localhost;dbname=serversideca';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }

    // switch($_GET['dir']){

    //     case "asc":
    //       $orderBy = " ORDER BY name ASC"
    //      //break;
        
    //     case "desc":
    //       $orderBy = " ORDER BY name DESC"
    //      //break;
        
    //     default:
    //       $orderBy = " ORDER BY name ASC"
    //      //break;
    //     }

        
?>
