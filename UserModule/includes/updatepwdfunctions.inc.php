<?php
function emptyInputPass($last_password, $new_password, $con_password){
    $result;
    if(empty($last_password) || empty($new_password) || empty($con_password)){
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
        header("location: ../account.php?error=stmtFailed");
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
    if(!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z].{9,}$/", $password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invUserPwdUid($conn, $new_password, $useruid){
    $uidExists = uidOrEmailExists($conn, $useruid, $useruid);

    if ($uidExists === false) {
        header('location: ../account.php?error=invalidLogin');
        exit();
    }
    
    $usersFirstName = $uidExists["usersFirstName"];
    $usersLastName = $uidExists["usersLastName"];
    return invUserPwd($new_password, $usersFirstName, $usersLastName, $useruid);

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

function invPrevPwd($conn, $userid, $new_password){
    $result;
    $sql = "SELECT user_history.pwdPassword FROM users INNER JOIN user_history ON user_history.pwdUserId = users.usersId WHERE users.usersId = ? ORDER BY user_history.pwdUpdateDt DESC LIMIT 6;";
    $stmt = mysqli_stmt_init($conn);
    $sentToList = array();
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $prepwd);
        $i=0;
        while (mysqli_stmt_fetch($stmt)) {
            $sentToList[$i] =  $prepwd;
            $i++;
        }
        mysqli_stmt_close($stmt);
    }
    
    foreach($sentToList as $pwdHashed){
        if(password_verify($new_password, $pwdHashed) === true){
            $result = true;
                break;
        }else{
            $result = false;
        }
    }
    return $result;
}

function changePass($conn, $userid, $useruid, $last_password, $new_password){
    $uidExists = uidOrEmailExists($conn, $useruid, $useruid);

    if ($uidExists === false) {
        header('location: ../account.php?error=invalidLogin');
        exit();
    }

    $pwdHashed = $uidExists["usersPassword"];
    $checkPassword = password_verify($last_password, $pwdHashed);
    if($checkPassword === false){
        header('location: ../account.php?error=invalidLastPwd');
        exit();
    }else if($checkPassword === true){

        $sql = "UPDATE users SET usersPassword=?, usersPwdDate=?  WHERE usersUid=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            header("location: ../account.php?error=stmtFailed");
            exit();
        }

        $hashedPwd = password_hash($new_password, PASSWORD_DEFAULT);
        $pwdDate = date("Y-m-d");

        mysqli_stmt_bind_param($stmt, "sss", $hashedPwd, $pwdDate, $useruid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);


        // insert a copy to child table
        $sql = "INSERT INTO user_history (pwdUserId, pwdPassword, pwdUpdateDt) SELECT usersId, usersPassword, usersPwdDate FROM users WHERE usersId = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            header("location: ../account.php?error=stmtFailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        session_start();
        $_SESSION["notifpwd"] =  false;

        header("location: ../account.php?msg=changePwdSuccess");
        exit();
    }
}