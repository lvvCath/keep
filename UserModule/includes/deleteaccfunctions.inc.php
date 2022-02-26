<?php
function emptyInput($username, $password, $deleteverify){
    $result;
    if(empty($username) || empty($password) || empty($deleteverify)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidOrEmailExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php#deleteAccount?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}


function deleteAcc($conn, $id){
    $sql = "DELETE FROM users WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    session_start();
    session_unset();
    session_destroy();

    header('location: ../../LoginModule/LogIn.php?msg=accdeleted');
    exit();
}

function validateDeleteAcc($conn, $username, $password, $deleteverify, $id){
    $uidOrEmailExists = uidOrEmailExists($conn, $username, $username);

    if ($uidOrEmailExists === false) {
        header('location: ../account.php?error=errDeleteAccVerification');
        exit();
    }

    if ($deleteverify != 'delete my account') {
        header('location: ../account.php?error=errDeleteAccVerification');
        exit();
    }

    $pwdHashed = $uidOrEmailExists["usersPassword"];
    $checkPassword = password_verify($password, $pwdHashed);
 
    if($checkPassword === false){
        header('location: ../account.php?error=invalidCredentials');
        exit();
    }else if($checkPassword === true){
        deleteAcc($conn, $id);
    }
}