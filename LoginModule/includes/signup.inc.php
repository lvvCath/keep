<?php

if(isset($_POST["submit"])){
    // echo "worked!";
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];

    require_once '../../Database/db.php';
    require_once 'functions.inc.php';

    $validation = true;

    if(emptyInputSignup($first_name, $last_name, $email, $username, $password, $con_password) !== false){
        header("location: ../SignUp.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username) !== false){
        header("location: ../SignUp.php?error=invalidUid");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../SignUp.php?error=invalidEmail");
        exit();
    }
    if(uidExists($conn, $username) !== false){
        header("location: ../SignUp.php?error=usernameTaken");
        exit();
    }
    if(emailExists($conn, $email) !== false){
        header("location: ../SignUp.php?error=emailTaken");
        exit();
    }
    if(pwdMatch($password, $con_password) !== false){
        header("location: ../SignUp.php?error=passwordNotMatch");
        exit();
    }
    if(invFormatPwd($password) !== false){
        header("location: ../SignUp.php?error=invalidPasswordFormat");
        exit();
    }
    if(invUserPwd($password, $first_name, $last_name, $username) !== false){
        header("location: ../SignUp.php?error=invalidPasswordfndName");
        exit();
    }
    if(invDictPwd($password) !== false){
        header("location: ../SignUp.php?error=invalidPasswordDict");
        exit();
    }
    

    createUser($conn, $first_name, $last_name, $email, $username, $password);

}else{
    header("location: ../SignUp.php");
    exit();
}
?>