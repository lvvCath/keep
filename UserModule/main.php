<?php
include('../Database/db.php'); 
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) { 
    header('location: ../index.php');
    exit();
}else{
     $id = $_SESSION["userid"];
}

$sql = "SELECT * FROM users  WHERE usersId = $id";
$stmt= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($stmt);
$first_name = $row['usersFirstName'];
$last_name =  $row['usersLastName'];
$email = $row['usersEmail'];
$username =  $row['usersUid'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
</head>


<body>
<div id="sideNav"><?php include 'header.php';?></div>
    

 
</body>
</html>




