<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Portfolio</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
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
                <form method="POST" action="includes/login.inc.php"> <br><br><br>
					<h1>Log in</h1> <br>
					<input name="uid" id="uid" type="text" class="email form-control" placeholder="Email or Username" required>
					<input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
					<br><br>
					<a href="#" class="forgot">Forgot your password?</a><br>
					<input name="LoginBtn" id="LoginBtn"  type="submit" class="btn signBtn" value="Login">
					<!-- <a href="LandingPage.php">Go Back</a> -->
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
					<!-- <a href="LandingPage.php">Go Back</a> -->
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

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo '<script>alert("Please fill all the input fields.")</script>';
    }
	else if($_GET["error"] == "invalidLogin"){
        echo '<script>alert("Incorrect Login Information.")</script>';
    }
}
if(isset($_GET["msg"])){
    if($_GET["msg"] == "registered"){
        echo '<script>alert("You have successfully registered! \r\nYou can now Login!")</script>';
    }
	else if($_GET["msg"] == "changePwdSuccess"){
        echo '<script>alert("You have successfully Updated your password! \r\nYou can now Login!")</script>';
    }
}
?>	

</body>
</html>

