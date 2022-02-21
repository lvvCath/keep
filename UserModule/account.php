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
    <link rel="stylesheet" href="css/account.css">
</head>


<body>
<div id="sideNav"><?php include 'header.php';?></div>



<div class="container d-flex justify-content-center flex-column mt-5">
    <div class="row g-5 p-3 mx-2">
    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title">General Account Settings</h4>
        <div class="hr"></div>
        <form class="row g-3 " id="createForm" name="createForm" method="POST" action="#">
        <div class="col-md-6">
            <label class="text-muted" for="first_name">First Name</label>
            <input class="form-control" id="first_name" name="first_name" type="text" required 
                    readonly value="<?php echo $row['usersFirstName']?>">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="last_name">Last Name</label>
            <input class="form-control" id="last_name" name="last_name" type="text" required
                    readonly value="<?php echo $row['usersLastName']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" required 
                    readonly value="<?php echo $row['usersEmail']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" required
                    readonly value="<?php echo $row['usersUid']?>">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="button" id="edit" class="btn btn-primary" onclick="clearForm()"><i class="fa fa-edit"></i>&nbspE D I T</button>
        </div>
        </form>
    </div>

    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title">Change Password</h4>
        <small id="passwordHelpBlock" class="form-text text-muted">
        It's a good idea to use a strong password that you're not using elsewhere <br>
        Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
        </small>
        <div class="hr"></div>        
        <form class="row g-3 " id="createForm" name="createForm" method="POST" action="includes/updatepwd.inc.php">
        <div class="col-12">
            <label class="text-muted" for="last_password">Current Password</label>
            <input class="form-control" id="last_password" name="last_password" type="password" required> 
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="new_password">New Password</label>
            <input class="form-control" id="new_password" name="new_password" type="password" required>
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="con_password">Confirm New Password</label>
            <input class="form-control" id="con_password" name="con_password" type="password" required> 
        </div>
        <!-- buttons -->
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>   
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button type="submit" id="createBtn" name="submit" class="btn btn-primary">C O N F I R M</button>      
        </div>   
        </form>
    </div>
    </div>
</div>


<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo '<script>alert("Please fill all the input fields.")</script>';
    }
    else if($_GET["error"] == "invalidLastPwd"){
        echo '<script>alert("Wrong Last password, Please enter your last password correctly.")</script>';
    }
    else if($_GET["error"] == "passwordNotMatch"){
        echo '<script>alert("Password does not match. Please confirm your password again.")</script>';
    }
    else if($_GET["error"] == "invalidPasswordFormat"){
        echo '<script>alert("Password does not conform to the Password Policy. \r\nPassword must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.")</script>';
    }
    else if($_GET["error"] == "invalidPasswordfndName"){
        echo '<script>alert("Password does not conform to the Password Policy. \r\nDo not use your name or username in your password.")</script>';
    }
    else if($_GET["error"] == "invalidPasswordDict"){
        echo '<script>alert("Password does not conform to the Password Policy. \r\nDo not use words from the Dictionary on your password.")</script>';
    }
    else if($_GET["error"] == "prevPassword"){
        echo '<script>alert("You have already used the password before. \r\nPlease enter a new password.")</script>';
    }
    else if($_GET["error"] == "stmtfailed"){
        echo '<script>alert("Something went wrong, please try again.")</script>';
    }
}
if(isset($_GET["msg"])){
    if($_GET["msg"] == "changePwdSuccess"){
        echo '<script>alert("You have successfully Updated your password!")</script>';
    }
}
?>
</body>
</html>




