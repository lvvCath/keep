<!doctype html>
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
    <?php include '../handler/error.php';?>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="form px-4 shadow-lg p-3 mb-5 bg-body rounded">
    <form class="row g-3" id="form" name="createForm" method="POST" action="includes/signup.inc.php">
        <div class="col-12">
            <a href="LogIn.php" class="float-end" style="color:grey;"><i class="fa-solid fa-right-to-bracket"></i></a> 
            <h1>Registration Form</h1>
            <div class="hr"+
            ></div>
        </div>
        
        <div class="col-md-6">
            <label class="text-muted" for="first_name">First Name</label>
            <input class="form-control" id="first_name" name="first_name" type="text" 
                pattern="^[a-zA-Z\s]*$"
                title="Name should only contain letters and whitespace."
                required>
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="last_name">Last Name</label>
            <input class="form-control" id="last_name" name="last_name" type="text" 
                pattern="^[a-zA-Z\s]*$"
                title="Name should only contain letters and whitespace."
                required> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" 
                pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                title="Please enter a valid Email (example@domain.com)"
                required> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" 
                onfocus="uidValidation()"
                pattern="[a-zA-Z][0-9a-zA-Z_]{4,19}[0-9a-zA-Z]" 
                title="Please conform to the Username requirements."
                required>
            <small id="usernameHelpBlock"  class="form-text text-muted">
            <p>	Must be at least (6-20) char long, which can consist of letters (a-z A-Z), numbers (0-9), and underscore (_)</p>
            <p id="uid_firstChar" class="font-awesome-icons invalid">first character should be a <b>letter</b></p>
            <p id="uid_lastChar" class="font-awesome-icons invalid">Last letter can be a <b>letter/number</b></p>
            <p id="uid_space" class="font-awesome-icons invalid">No <b>Whitespace</b></p>
            <p id="uid_length" class="font-awesome-icons invalid">username length <b>6-20 characters</b></p>
            </small>
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="password">Password </label>
            <span class="pwd-eye" onclick="password_show_hide();">
                <i class="fa fa-eye" id="show_eye"></i>
                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
            </span>
            <input class="form-control" id="password" name="password" type="password"
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
            <span class="pwd-eye" onclick="con_password_show_hide();">
                <i class="fa fa-eye" id="show_eye_c"></i>
                <i class="fa fa-eye-slash d-none" id="hide_eye_c"></i>
            </span>
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
    </form>
    </div>      
     
    
</div>

<script src="js/signup.js"></script>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="../bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>