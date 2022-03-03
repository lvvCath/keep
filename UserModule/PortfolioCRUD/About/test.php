<!-- <!DOCTYPE HTML>  
<html>
<head>
</head>
<body>   -->

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $name = test_input($_POST["name"]);
//   $name2 = $_POST["name"];
//   $email = test_input($_POST["email"]);
//   $website = test_input($_POST["website"]);
//   $comment = test_input($_POST["comment"]);
//   $gender = test_input($_POST["gender"]);
// }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
?>
<!-- 
<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>


// echo "<h2>Your Input:</h2>";
// echo $name2;
// echo "<br>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $website;
// echo "<br>";
// echo $comment;
// echo "<br>";
// echo $gender;


</body>
</html> -->



<?php
// header("location: ../test.php");
//     $_SESSION["test1"] = $userid;
//     $_SESSION["test2"] = $useruid;
//     $_SESSION["test3"] = $last_password;
//     $_SESSION["test4"] = $new_password;
//     exit();



include("../../../Database/db.php");

    session_start();
    $id = $_SESSION['userid'];
    echo $id; 

    $sql = "SELECT * FROM users_info WHERE userid = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../account.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    $row = mysqli_fetch_assoc($resultData);

    echo $row['description1']; 
    echo json_encode($row);
// echo $_SESSION["test2"]; 
// echo $_SESSION["test3"]; 
// echo $_SESSION["test4"]; 


// header('Content-Type: application/json');
// // include("../../../Database/db.php");

// session_start();
// $id = $_SESSION['userid'];

// $sql = "SELECT * FROM users_info WHERE userid = ?";
// $stmt = mysqli_stmt_init($conn);
// if(!mysqli_stmt_prepare($stmt, $sql)){
//     header("location: ../account.php?error=stmtFailed");
//     exit();
// }

// mysqli_stmt_bind_param($stmt, "i", $id);
// mysqli_stmt_execute($stmt);

// $resultData = mysqli_stmt_get_result($stmt);
// $rows = array();

// while($r = mysqli_fetch_assoc($resultData)) {
//     $rows[] = $r;

// echo json_encode($rows);

// mysqli_stmt_close($stmt);