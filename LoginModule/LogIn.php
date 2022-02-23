<?php
session_start();
// prevents user from going back to Login Page
if (isset($_SESSION["userid"])) { 
    header('location: ../UserModule/main.php');
    exit();
}

if (isset($_SESSION["locked"])){
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30){
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempt"]);
    }
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
            <p> Join now and be part of our community! <br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </p>
            <p class="question">Registered Already?</p>
            <button class="btn ghost signinBtn" id="signIn">SIGN IN</button>
        </div>
        <div class="box signup">
            <h1>Welcome Back!</h1>
            <p>Let's continue our jouney!</p>
            <p class="question">Not yet Registered? Join us now!</p>
            <button class="btn ghost signupBtn" id="signUp">SIGN UP</button>
        </div>
    </div>

    <div class="formBx">
        <div class="form signinForm">
            <form method="POST" action="includes/login.inc.php" name="signinForm"> <br><br><br>
                <h1>Log in</h1> <br>
                <input name="uid" id="uid" type="text" class="email form-control" placeholder="Email or Username" required>
                <input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
                <br><br>
                <a href="#" class="forgot">Forgot your password?</a><br>
                
                <?php
                    if (isset($_SESSION["login_attempt"])){
                        if ($_SESSION["login_attempt"] > 2){
                            if (!isset($_SESSION["locked"])){
                                $_SESSION["locked"] = time();
                            }
                            echo 'Locked';
                            echo '<div id="timer">00:00:00</div>';
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
                <p>	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class="form-check-label" for="flexCheckDefault">
                        Agree to the <a href="" class="terms">Terms and Conditions</a> and <a href="" class="terms">Privacy Policy</a> 
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

<script>
var timeoutHandle;
function countdown(minutes,stat) {
    var seconds = 30;
    var mins = minutes;

    if(getCookie("minutes")&&getCookie("seconds")&&stat){
        var seconds = getCookie("seconds");
        var mins = getCookie("minutes");
    }

    function tick() {
        var counter = document.getElementById("timer");
        setCookie("minutes",mins);
        setCookie("seconds",seconds);
        var current_minutes = mins;
        seconds--;
        counter.innerHTML = current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        // console.log(seconds);
        //save the time in cookie
        if(seconds > 0){
            timeoutHandle=setTimeout(tick, 1000);
        }
        else{
            // if(mins > 1){  
            // setTimeout(function () { countdown(parseInt(mins)-1,false); }, 1000);
            // }
            location.replace("LogIn.php");
            setCookie("minutes",0);
            setCookie("seconds",0);

        }
    }

    tick();
 }

function setCookie(cname,cvalue) {
    var d = new Date();
    // cookie expiration: days*hours*minutes*seconds*millisec
    d.setTime(d.getTime() + (30*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname+"="+cvalue+"; "+expires;
    console.log(document.cookie);
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

window.onload = function startingTimer(){
    countdown(0, true);
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
