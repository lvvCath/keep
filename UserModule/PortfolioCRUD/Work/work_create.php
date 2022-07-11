<?php
include("../../../Database/db.php");

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
session_start();
if ($_POST["action_work"] == "create") {
    $userid = $_SESSION['userid'];
    $project = validate_input($_POST['work_project']);
    $category = validate_input($_POST['work_category']);
    $description = validate_input($_POST['work_description']);
    $client = validate_input($_POST['work_client']);
    $project_date = validate_input($_POST['work_date']);
    $project_url = validate_input($_POST['work_url']);

    if($_FILES["work_image"]["tmp_name"] == ""){
        $sql = "INSERT INTO users_work (userid, project, category, description, client, project_date, project_url) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            echo json_encode(['code' => '400']);
        }
        mysqli_stmt_bind_param($stmt, "issssss", $userid, $project, $category, $description, $client, $project_date, $project_url);
    }else{
        $file = file_get_contents($_FILES["work_image"]["tmp_name"]);
        $sql = "INSERT INTO users_work (userid, project, category, description, client, project_date, project_url, img_work) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            echo json_encode(['code' => '400']);
        }
        mysqli_stmt_bind_param($stmt, "isssssss", $userid, $project, $category, $description, $client, $project_date, $project_url, $file);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_close($stmt);
    if($result){
        echo json_encode([
            'code' => '201'
        ]);
    }else{
        echo json_encode([
            'code' => '400'
        ]);
    }

}
?>