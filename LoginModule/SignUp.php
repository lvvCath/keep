<?php require('../Bootstrap/links.php');?>
<head>
	<!-- CSS -->
	<link rel="stylesheet" href="css/signUp.css">
</head>

<!-- Modal Create Form -->
<div class="container">
    <div class="modal-body">
        <form id="createForm" name="createForm" method="POST" action="includes/signup.inc.php">
        <h1>Registration Form</h1> 
        <hr style="height:5px; background-color: #045de9;background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">
            
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-muted" for="first_name">First Name</label>
                        <input class="form-control" id="first_name" name="first_name" type="text" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label class="text-muted" for="last_name">Last Name</label>
                        <input class="form-control" id="last_name" name="last_name" type="text" required> 
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="text-muted" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text" required> 
            </div>

            <div class="form-group">
                <label class="text-muted" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" required>
                <small id="usernameHelpBlock" class="form-text text-muted">
                Choose a username 6–20 characters long. Can be any combination of letters, numbers, or underscore(_)
                </small>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label class="text-muted" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" required>
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
                <button type="submit" id="createBtn" name="submit" class="btn btn-primary">R E G I S T E R</button>
            </div>
            
        </form>
        <a href="LogIn.php" style="color:white;">Go back to Login</a>
    </div>
    
<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo '<script>alert("Please fill all the input fields.")</script>';
    }
    else if($_GET["error"] == "invalidUid"){
        echo '<script>alert("The Username you entered is invalid.")</script>';
    }
    else if($_GET["error"] == "invalidEmail"){
        echo '<script>alert("Please enter a valid email")</script>';
    }
    else if($_GET["error"] == "passwordNotMatch"){
        echo '<script>alert("Password does not match. Please confirm your password again.")</script>';
    }
    else if($_GET["error"] == "usernameTaken"){
        echo '<script>alert("The Username you entered is already taken.")</script>';
    }
    else if($_GET["error"] == "emailTaken"){
        echo '<script>alert("The Email you entered is already taken. \r\nPlease Use different Email to create a new account.")</script>';
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