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
$project = validate_input($_POST['project']);
$category = validate_input($_POST['category']);
$description = validate_input($_POST['description']);
$image = validate_input($_POST['image']);
$client = validate_input($_POST['client']);
$project_date = validate_input($_POST['project_date']);
$project_url = validate_input($_POST['project_url']);

$sql = "INSERT INTO users_work (userid, project, category, description, image, client, project_date, project_url) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql) ){
    echo json_encode([
        'code' => '400'
    ]);
}

mysqli_stmt_bind_param($stmt, "isssssss",   $userid, 
                                            $project, 
                                            $category, 
                                            $description, 
                                            $image, 
                                            $client, 
                                            $project_date, 
                                            $project_url);
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