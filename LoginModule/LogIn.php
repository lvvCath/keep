<?php
session_start();
// prevents user from going to main from changepass
if(isset($_SESSION["changepass"])){
    session_unset();
    session_destroy();
}
// prevents user from going back to Login Page
if (isset($_SESSION["userid"])) { 
    header('location: ../UserModule/main.php');
    exit();
}

if (isset($_SESSION["locked"])){
    $difference = time() - $_SESSION["locked"];
    if ($difference > 29){
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempt"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-site-verification" content="kOev4hzbxa-6pgwXRETX7SsqWVn_AGAomT7r1AFkFRQ" />
    <title>KEEP</title>
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css -->
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
    <?php include '../handler/error.php';?>
</head>
<body>
<div class="container">
    <div class="blueBg">
        <div class="box signin">
            <h1>Join now!</h1>
            <p> Join now and be part of our growing community! <br>
            </p>
            <p class="question">Registered Already?</p>
            <button class="btn ghost signinBtn" id="signIn">SIGN IN</button>
        </div>
        <div class="box signup">
            <h1>Welcome Back!</h1>
            <p>Let's continue our journey!</p>
            <p class="question">Not yet Registered? Join us now!</p>
            <button class="btn ghost signupBtn" id="signUp">SIGN UP</button>
        </div>
    </div>

    <div class="formBx">
        <div class="form signinForm">
            <form method="POST" action="<?php echo htmlspecialchars("includes/login.inc.php");?>" name="signinForm"> <br><br><br>
                <h1>Log in</h1> <br>
                <div class="form-floating">
                    <input name="uid" id="uid" type="text" class="email form-control" placeholder="Email or Username" required>
                    <label for="floatingInput">Email or Username</label>
                </div>
                 <div class="form-floating">
                    <input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <br><br>
                <a href="forgot-password.php" class="forgot">Forgot your password?</a><br>
                
                <?php
                    if (isset($_SESSION["login_attempt"])){
                        if ($_SESSION["login_attempt"] > 2){
                            if (!isset($_SESSION["locked"])){
                                $_SESSION["locked"] = time();
                            }
                            echo 'Locked';
                            echo '<script src="js/lock.js"></script>';
                            echo '<script>lock = true;</script>';
                            echo '<div id="timer">00:00</div>';
                            
                        }else{
                            echo '<input name="LoginBtn" id="LoginBtn"  type="submit" class="btn signBtn" value="Login">';
                        }
                    }else{
                        echo '<input name="LoginBtn" id="LoginBtn"  type="submit" class="btn signBtn" value="Login">';
                    }
                    
                ?>
            </form>
        </div>

        <div class="form signupForm">
            <form action="SignUp.php" method="POST"> <br> <br>
                <h1>Be part of our Community!!</h1> <br>
                <p>Create your online portfolio now and showcase your Stunning Works Online!
                </p><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                        Agree to the <a href="terms.php" class="terms">Terms and Conditions</a> and <a href="terms.php" class="terms">Privacy Policy</a> 
                    </label>
                </div>
                <input name="SignupBtn"  id="SignupBtn" href="SignUp.php" type="submit" class="btn signBtn" value="Get Started">
            </form>
        </div>
    </div>
</div>

<!-- For swiching Log in and Sign up -->
<script>
    const signinBtn = document.querySelector('.signinBtn');
    const signupBtn = document.querySelector('.signupBtn');
    const formBx = document.querySelector('.formBx');
    const body =document.querySelector('body');

    signupBtn.onclick = function(){
        formBx.classList.add('active')
        body.classList.add('active');
    }

    signinBtn.onclick = function(){
        formBx.classList.remove('active')
        body.classList.remove('active');
    }
</script>

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
