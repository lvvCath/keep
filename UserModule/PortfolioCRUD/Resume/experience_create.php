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
$job = validate_input($_POST['job']);
$startDate = validate_input($_POST['startDate']);
$endDate = validate_input($_POST['endDate']);
$location = validate_input($_POST['location']);
$description = validate_input($_POST['description']);

$sql = "INSERT INTO users_experience (userid, job, startDate, endDate, location, description) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql) ){
    echo json_encode([
        'code' => '400'
    ]);
}

mysqli_stmt_bind_param($stmt, "isssss", $userid, $job, $startDate, $endDate, $location, $description);
$result = mysqli_stmt_execute($stmt);

if($result){
    echo json_encode([
        'code' => '201'
    ]);
}else{
    echo json_encode([
        'code' => '400'
    ]);
}

mysqli_stmt_close($stmt);
?>