<?php 
 $sqlResume = "SELECT * FROM users INNER JOIN users_info INNER JOIN users_education INNER JOIN users_experience INNER JOIN users_skill INNER JOIN users_service INNER JOIN users_work ON users.usersId = users_info.userid AND users.usersId = users_education.userid AND users.usersId = users_experience.userid AND users.usersId = users_skill.userid AND users.usersId = users_service.userid AND users.usersId = users_work.userid  WHERE users.usersId = $id";

$stmtResume = mysqli_query($conn, $sqlResume);
$rowResume = mysqli_fetch_array($stmtResume);
 $rowResumes[] = $rowResume;
 ?>