<?php
session_start();
?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="css/logInSignUp.css">
</head>

<div class="container" id="container">
    <!-- Sign Up Part -->
	<div class="form-container sign-up-container">
		<form action="SignUp.php" method="POST"> <br> <br>
			<h1>Welcome to our Community!!</h1> <br>
			<p>	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
			</p>
			<br>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
				<label class="form-check-label" for="flexCheckDefault">
					Agree to the <a href="" class="terms">Terms and Conditions</a> and <a href="" class="terms">Privacy Policy</a> 
				</label>
			</div>
            <input name="SignupBtn"  id="SignupBtn" href="SignUp.php" type="submit" class="btn ghost signBtn" value="Get Started">
			<!-- <a href="LandingPage.php">Go Back</a> -->
		</form>
	</div>
    <!-- Log In Part -->
	<div class="form-container sign-in-container">
		<form method="POST" action="includes/login.inc.php"> <br><br><br>
			<h1>Log in</h1> <br>
            <input name="uid" id="uid" type="text" class="email form-control" placeholder="Email or Username" required>
            <input name="password" id="password" type="password" class="password form-control" placeholder="Password" required>
			<br><br><br>
			<a href="#" >Forgot your password?</a>
            <input name="LoginBtn" id="LoginBtn"  type="submit" class="ghost signBtn" value="Login">
			<!-- <a href="LandingPage.php">Go Back</a> -->
		</form>
	</div>
    <!-- Overlay Part  -->
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Join now!</h1>
				<p> Join now and be part of our community! <br>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit.
				</p>
                <p class="question">Registered Already?</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welcome Back!</h1>
				<p>Let's continue our jouney!</p>
                <p class="question">Not yet Registered? Join us now!</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>

<?php
if(isset($_GET["error"])){
    if($_GET["error"] == "emptyinput"){
        echo '<script>alert("Please fill all the input fields.")</script>';
    }else if($_GET["error"] == "invalidLogin"){
        echo '<script>alert("Incorrect Login Information.")</script>';
    }
}
if(isset($_GET["msg"])){
    if($_GET["msg"] == "registered"){
        echo '<script>alert("You have successfully registered! \r\nYou can now Login!")</script>';
    }
}
?>	
</div>

<!-- For swiching Log in and Sign up -->
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
