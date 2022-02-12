<?php


if(isset($_POST["LoginBtn"])){
    $username = $_POST["uid"];
    $password = $_POST["password"];

    require_once '../../Database/db.php';
    require_once 'functions.inc.php';

 
    if(emptyInputLogin($username, $password) !== false){
        header("location: ../LogIn.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $username, $password);

}else{
    header("location: ../LogIn.php");
    exit();
}
?>