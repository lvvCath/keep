<?php
// SignUp Functions
function emptyInputSignup($first_name, $last_name, $email, $username, $password, $con_password){
    $result;
    if(empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($con_password)){
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

function uidExists($conn, $username){
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $username);
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

function emailExists($conn, $email){
    $sql = "SELECT * FROM users WHERE usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
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

function pwdMatch($password, $con_password){
    $result;
    if($password !== $con_password){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invFormatPwd($password){
    $result;
    // Password must be at least (10) characters long, which consist of at least (1) upper case letter, 1 lower case letter, 1 number and 1 special character.
    if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z].{10,}$/", $password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invUserPwd($password, $first_name, $last_name, $username){
    $result;
    $password = strtolower($password);
    $first_name = strtolower($first_name);
    $last_name = strtolower($last_name);
    $username = strtolower($username);

    // Password must not contain the username, first or last name
    if(strpos($password, $first_name) !== false || strpos($password, $last_name) !== false || strpos($password, $username) !== false) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invDictPwd($password){
    $result;
    $password = strtolower($password);
    $dictarray = file('../../assets/dictionary.txt');

    foreach($dictarray as $word){
        $word = strtolower(trim($word));
        if(strlen($word) > 3){
            if(stripos($password, $word) !== false){
                $result = true;
                break;
            }else{
                $result = false;
            }
        }
    }
    return $result;
}

function createUser($conn, $first_name, $last_name, $email, $username, $password){
    $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUid, usersPassword, usersPwdDate) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql) ){
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $pwdDate = date("Y-m-d");

    mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $email, $username, $hashedPwd, $pwdDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: ../LogIn.php?msg=registered");
}

// Login Functions
function emptyInputLogin($username, $password){
    $result;
    if(empty($username) || empty($password)){
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
        header("location: ../SignUp.php?error=stmtFailed");
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

function loginUser($conn, $username, $password){
    $uidOrEmailExists = uidOrEmailExists($conn, $username, $username);

    if ($uidOrEmailExists === false) {
        header('location: ../LogIn.php?error=invalidLogin');
        exit();
    }

    $pwdHashed = $uidOrEmailExists["usersPassword"];
    $checkPassword = password_verify($password, $pwdHashed);

    $pwdDate = $uidOrEmailExists["usersPwdDate"];
    $expiredPwd = false;
    if(strtotime($pwdDate) < strtotime('-30 days')){
        $expiredPwd = true;
    }

    if($checkPassword === false){
        header('location: ../LogIn.php?error=invalidLogin');
        exit();
    }else if($checkPassword === true AND $expiredPwd === false){
        session_start();
        $_SESSION["userid"] =  $uidOrEmailExists["usersId"];
        $_SESSION["useruid"] =  $uidOrEmailExists["usersUid"];
        header("location: ../../UserModule/Main.php");
        exit();
    }else if($checkPassword === true AND $expiredPwd === true){
        session_start();
        $_SESSION["userid"] =  $uidOrEmailExists["usersId"];
        $_SESSION["useruid"] =  $uidOrEmailExists["usersUid"];
        header("location: ../ChangePass.php");
        exit();
    }

}