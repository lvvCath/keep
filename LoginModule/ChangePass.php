<?php 
session_start();
if(!isset($_SESSION["userid"]) && !isset($_SESSION["useruid"])){
    header('location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>KEEP</title>
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css -->
    <link rel="stylesheet" href="css/signUp.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
</head>
<body>
<?php include '../handler/error.php';?>
<script>
function clearForm() {
    document.getElementById("form").reset();
}
</script>
<div class="container d-flex justify-content-center">
    <div class="form p-4 shadow-lg p-3 mb-5 bg-body rounded">
        <form name="changePassForm" id="form" method="POST" action="includes/changepass.inc.php">
            <h1>Change Password</h1>
            <p>Your password already expired. Please change you password to Login.</p> 
            <div class="hr"></div>
            <div class="row g-3 mt-2">
                <div class="col-12">
                    <label class="text-muted" for="last_password">Last Password</label>
                    <span class="pwd-eye" onclick="password_show_hide();">
                        <i class="fa fa-eye" id="show_eye"></i>
                        <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                    <input class="form-control" id="last_password" name="last_password" type="password" required> 
                </div>
                <div class="col-md-6">
                    <label class="text-muted" for="new_password">New Password</label>
                    <input class="form-control" id="new_password" name="new_password" type="password" 
                        onfocus="showValidation()"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[_\W]).{10,}" title="Please conform to the Password Policy."
                        required>
                    <small id="passwordHelpBlock"  class="form-text text-muted">
                        <p>Password must conform the following requirements:</p>
                        <p id="pwd_letter" class="font-awesome-icons invalid">1 <b>Lowercase</b> letter</p>
                        <p id="pwd_capital" class="font-awesome-icons invalid">1 <b>Uppercase</b> letter</p>
                        <p id="pwd_number" class="font-awesome-icons invalid">1 <b>Number</b></p>
                        <p id="pwd_symbol" class="font-awesome-icons invalid">1 <b>Special character</b></p>
                        <p id="pwd_length" class="font-awesome-icons invalid">Minimum <b>10 characters</b></p>
                    </small>
                </div>
                <div class="col-md-6">
                    <label class="text-muted" for="con_password">Confirm Password</label>
                    <input class="form-control" id="con_password" name="con_password" type="password" 
                        onfocus="conPasswordValidation()"
                        required>
                    <small id="conpasswordHelpBlock"  class="form-text text-muted">
                        <p id="conpwd_match" class="font-awesome-icons invalid">Password does not match</p>
                    </small>
                </div>
                <!-- buttons -->
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>  
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <button type="submit" id="createBtn" name="submit" class="btn btn-primary">R E G I S T E R</button>     
                </div>
            </div>
        </form>
        <a href="LogIn.php" style="color:white;">Go back to Login</a>
    </div>
</div>

<script src="js/changepass.js"></script>

<script src="../bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>