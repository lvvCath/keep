<?php
if(isset($_POST["deleteAccountBtn"])){
    session_start();
    $id = $_SESSION["userid"];
    $username = $_POST["uid"];
    $password = $_POST["password"];
    $deleteverify = $_POST["deleteverify"];

    require_once '../../Database/db.php';
    require_once 'deleteaccfunctions.inc.php';

 
    if(emptyInput($username, $password, $deleteverify) !== false){
        header("location: ../account.php?error=emptyinput");
        exit();
    }
    
    validateDeleteAcc($conn, $username, $password, $deleteverify, $id);

}else{
    header("location: ../account.php");
    exit();
}
?>