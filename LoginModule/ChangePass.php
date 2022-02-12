<?php require('../Bootstrap/links.php');
session_start();
?>
<head>
	<!-- CSS -->
	<link rel="stylesheet" href="css/signUp.css">
</head>

<!-- Modal Create Form -->
<div class="container">
    <div class="modal-body">
        <form id="createForm" name="createForm" method="POST" action="includes/changepass.inc.php">
        <h1>Change Password</h1>
        <h4>Your password already expired. Please change you password to Login.</h4> 
        <hr style="height:5px; background-color: #045de9;background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">
            <br>
            <div class="form-group">
                <label class="text-muted" for="last_password">Last Password</label>
                <input class="form-control" id="last_password" name="last_password" type="password" required> 
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-muted" for="new_password">New Password</label>
                        <input class="form-control" id="new_password" name="new_password" type="password" required>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                        Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
                        </small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-muted" for="con_password">Confirm Password</label>
                        <input class="form-control" id="con_password" name="con_password" type="password" required> 
                    </div>
                </div>
            </div>

            <br>
            <div class="d-flex justify-content-center">
                <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>
                <button type="submit" id="createBtn" name="submit" class="btn btn-primary">C O N F I R M</button>
            </div>
            
        </form>
        <a href="LogIn.php" style="color:white;">Go back to Login</a>
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
?>
</div>


<script>
function clearForm() {
    $('#createForm').trigger("reset");
}
</script>