<?php
include("../../../Database/db.php");

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_POST["action_work"] == "update") {
    
    $id = intval(validate_input($_POST['image_work_id']));
    $project = validate_input($_POST['work_project']);
    $category = validate_input($_POST['work_category']);
    $description = validate_input($_POST['work_description']);
    $client = validate_input($_POST['work_client']);
    $project_date = validate_input($_POST['work_date']);
    $project_url = validate_input($_POST['work_url']);

    if($_FILES["work_image"]["tmp_name"] == ""){
        $sql = "UPDATE users_work SET   project=?, 
                                        category=?, 
                                        description=?,
                                        client=?,
                                        project_date=?,
                                        project_url=?
                WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            echo json_encode(['code' => '400']);
        }
        mysqli_stmt_bind_param($stmt, "ssssssi", $project, $category, $description, $client, $project_date, $project_url, $id);
    }else{
        $file = file_get_contents($_FILES["work_image"]["tmp_name"]);
        $sql = "UPDATE users_work SET   project=?, 
                                        category=?, 
                                        description=?,
                                        client=?,
                                        project_date=?,
                                        project_url=?,
                                        img_work=?
                WHERE id = ?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql) ){
            echo json_encode(['code' => '400']);
        }
        mysqli_stmt_bind_param($stmt, "sssssssi", $project, $category, $description, $client, $project_date, $project_url, $file, $id);
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