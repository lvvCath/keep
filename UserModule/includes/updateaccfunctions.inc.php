<?php

function emptyInputSignup($first_name, $last_name, $email, $username){
    $result;
    if(empty($first_name) || empty($last_name) || empty($email) || empty($username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidUid($username){
    $result;
    if(!preg_match("/^[a-zA-Z][0-9a-zA-Z_]{4,19}[0-9a-zA-Z]$/", $username)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $id){
    $sql = "SELECT * FROM users WHERE usersUid = ? AND usersId != ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $username, $id);
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

function emailExists($conn, $email, $id){
    $sql = "SELECT * FROM users WHERE usersEmail = ? AND usersId != ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "si", $email, $id);
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

function updateAcc($conn, $first_name, $last_name, $email, $username, $id){
    $sql = "UPDATE users SET usersFirstName=?, usersLastName=?, usersEmail=?, usersUid=? WHERE usersId = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $first_name, $last_name, $email, $username, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../account.php?msg=accupdated");
}