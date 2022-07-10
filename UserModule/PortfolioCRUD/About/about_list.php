<?php 
/*To Get All Items in the Table (list.php).*/

header('Content-Type: application/json');
include("../../../Database/db.php");

session_start();
$id = $_SESSION['userid'];

$sql = "SELECT 
        userid, age, phone, city, degree, experience, website, email, freelance, profession, description1, description2
        FROM users_info WHERE userid = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: main.php?error=stmtFailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

if($row = mysqli_fetch_assoc($resultData)){
    echo json_encode($row);
}else{
    header("location: main.php?error=stmtFailed");
    exit();
}

mysqli_stmt_close($stmt);
?>