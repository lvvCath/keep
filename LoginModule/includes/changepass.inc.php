<?php

if(isset($_POST["submit"])){
    session_start();
    $userid = $_SESSION["userid"];
    $useruid = $_SESSION["useruid"];
    $last_password = $_POST["last_password"];
    $new_password = $_POST["new_password"];
    $con_password = $_POST["con_password"];

    require_once '../../Database/db.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($last_password, $new_password, $con_password) !== false){
        header("location: ../ChangePass.php?error=emptyinput");
        exit();
    }
    if(pwdMatch($new_password, $con_password) !== false){
        header("location: ../ChangePass.php?error=passwordNotMatch");
        exit();
    }
    if(invFormatPwd($new_password) !== false){
        header("location: ../ChangePass.php?error=invalidPasswordFormat");
        exit();
    }
    if(invUserPwdUid($conn, $new_password, $useruid) !== false){
        header("location: ../ChangePass.php?error=invalidPasswordfndName");
        exit();
    }
    if(invDictPwd($new_password) !== false){
        header("location: ../ChangePass.php?error=invalidPasswordDict");
        exit();
    }
    if(invPrevPwd($conn, $userid, $new_password) !== false){
        header("location: ../ChangePass.php?error=prevPassword");
        exit();
    }
    
    changePass($conn, $useruid, $last_password, $new_password);

}else{
    header("location: ../ChangePass.php");
    exit();
}
?>