<?php
header('Content-Type: application/json');
include("../../../Database/db.php");

function validate_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$userid = validate_input($_POST['userid']);
$profession = validate_input($_POST['profession']);
$description2 = validate_input($_POST['description2']);
$image2 = validate_input($_POST['image2']);
$age = validate_input($_POST['age']);
$phone = validate_input($_POST['phone']);
$city = validate_input($_POST['city']);
$degree = validate_input($_POST['degree']);
$experience = validate_input($_POST['experience']);
$website = validate_input($_POST['website']);
$email = validate_input($_POST['email']);
$freelance = validate_input($_POST['freelance']);

$sql = "UPDATE users_info SET 
        profession=?, 
        description2=?,
        image2=?,
        age=?,
        phone=?,
        city=?,
        degree=?,
        experience=?,
        website=?,
        email=?,
        freelance=?

        WHERE userid = ?;";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql) ){
    echo json_encode([
        'code' => '400'
    ]);
}

mysqli_stmt_bind_param($stmt, "sssisssisssi",   $profession, 
                                                $description2,
                                                $image2, 
                                                $age, 
                                                $phone, 
                                                $city, 
                                                $degree, 
                                                $experience, 
                                                $website, 
                                                $email, 
                                                $freelance, 
                                                $userid);
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
    

?>