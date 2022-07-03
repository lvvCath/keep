<?php
$sql = "SELECT * FROM users  WHERE usersId = $id";
$stmt= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($stmt);
$first_name = $row['usersFirstName'];
$middle_name =  $row['usersMiddleName'];
$last_name =  $row['usersLastName'];
$suffix_name =  $row['usersSuffix'];
$email = $row['usersEmail'];
$username =  $row['usersUid'];
?>