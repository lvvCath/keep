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

function pwdMatch($password, $con_password){
    $result;
    if($password !== $con_password){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidPwd($password){
    $result;
    if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z].{10,}$/", $password)){
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

function createUser($conn, $first_name, $last_name, $email, $username, $password){
    $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersUid, usersPassword) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../SignUp.php?error=stmtFailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $username, $hashedPwd);
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

    if($checkPassword === false){
        header('location: ../LogIn.php?error=invalidLogin');
        exit();
    }else if($checkPassword === true){
        session_start();
        $_SESSION["userid"] =  $uidOrEmailExists["usersId"];
        $_SESSION["useruid"] =  $uidOrEmailExists["usersUid"];
        header("location: ../main.php");
        exit();
    }

}

