<?php
session_start();

require 'config.php';

if(isset($_GET['id']) && empty($_GET['id']) == false){
    $id = addslashes($_GET['id']);
     
    $sql = "DELETE  FROM users WHERE id = '$id'";
    $pdo->query($sql);

    
    header("Location: listagem.php");
}else{
    header("Location: listagem.php");
}

?>