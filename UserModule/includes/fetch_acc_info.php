<?php
$sql = "SELECT * FROM users  WHERE usersId = $id";
$stmt= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($stmt);
$first_name = $row['usersFirstName'];
$last_name =  $row['usersLastName'];
$email = $row['usersEmail'];
$username =  $row['usersUid'];
?>