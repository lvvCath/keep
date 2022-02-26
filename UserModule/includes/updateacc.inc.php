<?php

if(isset($_POST["update"])){
    session_start();
    $id = $_SESSION["userid"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];

    require_once '../../Database/db.php';
    require_once 'updateaccfunctions.inc.php';

    if(emptyInputSignup($first_name, $last_name, $email, $username) !== false){
        header("location: ../account.php?error=emptyinput");
        exit();
    }
    if(invalidName($first_name, $last_name) !== false){
        header("location: ../account.php?error=invalidName");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../account.php?error=invalidUid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../account.php?error=invalidEmail");
        exit();
    }
    if(uidExists($conn, $username, $id) !== false){
        header("location: ../account.php?error=usernameTaken");
        exit();
    }
    if(emailExists($conn, $email, $id) !== false){
        header("location: ../account.php?error=emailTaken");
        exit();
    }
    

    updateAcc($conn, $first_name, $last_name, $email, $username, $id);

}else{
    header("location: ../account.php");
    exit();
}
?>