<?php 
 $sqlResume = "SELECT * FROM users INNER JOIN users_info INNER JOIN users_education INNER JOIN users_experience INNER JOIN users_skill INNER JOIN users_service ON users.usersId = users_info.userid AND users.usersId = users_education.userid AND users.usersId = users_experience.userid AND users.usersId = users_skill.userid AND users.usersId = users_service.userid  WHERE users.usersId = $id";

$stmtResume= mysqli_query($conn, $sqlResume);
$rowResume= mysqli_fetch_array($stmtResume);



$sqlWork = "SELECT * FROM users INNER JOIN users_work INNER JOIN work_information ON 
users.usersId = users_work.userid AND
users_work.workid = work_information.workid WHERE users.usersId = $id";

$stmtWork= mysqli_query($conn, $sqlWork);
$rowWork= mysqli_fetch_array($stmtWork);
          
 ?>