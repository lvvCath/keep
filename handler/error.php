<!-- external css -->
<link rel="stylesheet" href="../handler/error.css">
<?php
if(isset($_GET["error"])){
    echo '<div class="alert alert-danger alert-dismissible fade show " role="alert">';
    echo '  <h4 class="alert-heading"><span class="fa-solid fa-triangle-exclamation"></span> Invalid Input</h4>';
    if($_GET["error"] == "emptyinput"){
        echo '<p>Please fill all the input fields.</p>';
    }
    // Login
    else if($_GET["error"] == "invalidLogin"){
        echo '<p>Incorrect Login Information.</p>';
    }
    // Account
    else if($_GET["error"] == "invalidUid"){
        echo '<p>The Username you entered is invalid.</p>';
    }
    else if($_GET["error"] == "invalidEmail"){
        echo '<p>Please enter a valid email</p>';
    }
    else if($_GET["error"] == "usernameTaken"){
        echo '<p>The Username you entered is already taken.</p>';
    }
    else if($_GET["error"] == "emailTaken"){
        echo '<p>The Email you entered is already taken. <br>Please Use different Email to create a new account.</p>';
    }
    else if($_GET["error"] == "passwordNotMatch"){
        echo '<p>Password does not match. Please confirm your password again.</p>';
    }
    else if($_GET["error"] == "invalidPasswordFormat"){
        echo '<p>Password does not conform to the Password Policy. <br>Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.</p>';
    }
    else if($_GET["error"] == "invalidPasswordfndName"){
        echo '<p>Password does not conform to the Password Policy. <br>Do not use your name or username in your password.</p>';
    }
    else if($_GET["error"] == "invalidPasswordDict"){
        echo '<p>Password does not conform to the Password Policy. <br>Do not use words from the Dictionary on your password.</p>';
    }
    else if($_GET["error"] == "prevPassword"){
        echo '<script>alert("You have already used the password before. \r\nPlease enter a new password.")</script>';
    }
    else if($_GET["error"] == "stmtFailed"){
        echo '<p>Something went wrong, please try again.</p>';
    }

    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if(isset($_GET["msg"])){
    echo '<div class="alert alert-success alert-dismissible fade show " role="alert">';
    echo '  <h4 class="alert-heading"><span class="fa-solid fa-circle-check"></span> Success!</h4>';
    // Update Acc
    if($_GET["msg"] == "accUpdated"){
        echo '<p>You have successfully Updated your Account!</p>';
    }
    // Login
    else if($_GET["msg"] == "registered"){
        echo '<p>You have successfully registered! <br>You can now Login!</p>';
    }
	else if($_GET["msg"] == "changePwdSuccess"){
        echo '<p>You have successfully Updated your password!';
    }
    echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
?>
<script>
    function clearForm() {
        $('#createForm').trigger("reset");
    }
</script>

