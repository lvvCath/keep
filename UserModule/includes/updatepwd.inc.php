<?php

if(isset($_POST["submit"])){
    session_start();
    $userid = $_SESSION["userid"];
    $useruid = $_SESSION["useruid"];
    $last_password = $_POST["last_password"];
    $new_password = $_POST["new_password"];
    $con_password = $_POST["con_password"];

    require_once '../../Database/db.php';
    require_once 'updatepwdfunctions.inc.php';

    if(emptyInputPass($last_password, $new_password, $con_password) !== false){
        header("location: ../account.php?error=emptyinput");
        exit();
    }
    if(pwdMatch($new_password, $con_password) !== false){
        header("location: ../account.php?error=passwordNotMatch");
        exit();
    }
    if(invFormatPwd($new_password) !== false){
        header("location: ../account.php?error=invalidPasswordFormat");
        exit();
    }
    if(invUserPwdUid($conn, $new_password, $useruid) !== false){
        header("location: ../account.php?error=invalidPasswordfndName");
        exit();
    }
    if(invDictPwd($new_password) !== false){
        header("location: ../account.php?error=invalidPasswordDict");
        exit();
    }
    if(invPrevPwd($conn, $userid, $new_password) !== false){
        header("location: ../account.php?error=prevPassword");
        exit();
    }
    
    changePass($conn, $userid, $useruid, $last_password, $new_password);

}else{
    header("location: ../account.php");
    exit();
}
?>