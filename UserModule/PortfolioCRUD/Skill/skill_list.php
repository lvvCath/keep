<?php 
header('Content-Type: application/json');
include("../../../Database/db.php");

session_start();
$id = $_SESSION['userid'];

$sql = "SELECT * FROM users_skill WHERE userid = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("location: main.php?error=stmtFailed");
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultData = mysqli_stmt_get_result($stmt);

while($row = mysqli_fetch_assoc($resultData)) {
    $array[] = $row;
}
echo json_encode($array);
mysqli_stmt_close($stmt);
?>