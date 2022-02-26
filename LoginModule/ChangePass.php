<?php 
session_start();
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
</head>
<body>
<?php include '../handler/error.php';?>

<div class="container d-flex justify-content-center">
    <div class="changePass-container p-4 shadow-lg p-3 mb-5 bg-body rounded">
        <form name="changePassForm" method="POST" action="includes/changepass.inc.php">
            <h1>Change Password</h1>
            <p>Your password already expired. Please change you password to Login.</p> 
            <div class="hr"></div>
            <div class="row g-3 mt-2">
                <div class="col-12">
                    <label class="text-muted" for="last_password">Last Password</label>
                    <input class="form-control" id="last_password" name="last_password" type="password" required> 
                </div>
                <div class="col-md-6">
                    <label class="text-muted" for="new_password">New Password</label>
                    <input class="form-control" id="new_password" name="new_password" type="password" required>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                    Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
                    </small>
                </div>
                <div class="col-md-6">
                <label class="text-muted" for="con_password">Confirm Password</label>
                        <input class="form-control" id="con_password" name="con_password" type="password" required> 
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


<script>
function clearForm() {
    $('#clearBtn').trigger("reset");
}
</script>

</body>
</html>