<?php
header('Content-Type: application/json');
include("../../../Database/db.php");

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
$userid = validate_input($_SESSION['userid']);
$useruid = validate_input($_SESSION['useruid']);
$token = sha1(uniqid($useruid, true));

$sql = "UPDATE users_share SET token=? WHERE userid = ?;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql) ){
    echo json_encode([
        'code' => '400'
    ]);
}else{
    mysqli_stmt_bind_param($stmt, "si", $token, $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_close($stmt);
}

if($result){
    echo json_encode([
        'code' => '201'
    ]);
}else{
    echo json_encode([
        'code' => '400'
    ]);
}


?>