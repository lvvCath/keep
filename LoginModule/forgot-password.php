<!DOCTYPE html>
<html lang="en">
<head>
    <title>KEEP</title>
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css -->
    <link rel="stylesheet" href="css/forgottenPassword.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
</head>
<body>
<style type="text/css">

</style>
<?php include '../handler/error.php';?>
<script>
function clearForm() {
    document.getElementById("form").reset();
}
</script>
 <div class="container d-flex justify-content-center">
    <div class="form p-4 shadow-lg p-3 mb-5 bg-body rounded">
        <form name="createPassword" id="form" method="POST" action="<?php echo htmlspecialchars("includes/request-email-password.php");?>">
            <h1>Forgot Password</h1>
            <p>Generate OTP. Please enter your email address.</p>
            <div class="hr"></div>
            <div class="row g-4 mt-2">
                <div class="col-md-12">
                    <div class="form-floating">
                    <input name="usersEmail" id="uid" type="text" class="email form-control" placeholder="Enter email address" required><br>
                    <label for="floatingInput">Email address</label>       
                 <!-- buttons -->
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>  
                    <button type="submit" id="createBtn" name="check-email" class="btn btn-primary">C O N F I R M</button>     
                </div>
                </div>
            </div>
        </form><br>

        <a href="LogIn.php" style="color:black;"><i class="fa-solid fa-circle-arrow-left"></i> Login</a>
    </div>
</div>
<script src="js/changepass.js"></script>

<script src="../bootstrap-5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

