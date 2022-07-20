<?php 
session_start();


    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        require_once '../../Database/db.php';
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM users WHERE usersOtp = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) == 1){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['usersEmail'];
            $_SESSION['usersEmail'] = $email;
            $code = 0;
            $update_otp = "UPDATE users SET usersOtp = $code WHERE usersEmail = '$email'";
            $run_query = mysqli_query($conn, $update_otp);
                header("location: ../newpassword.php?msg=CorrectOtp");
                exit();
        }else{
               header("location: ../otp-verification.php?error=IncOTP");
                exit();
        }
    }
    //if user click change password button
    if(isset($_POST['change-password'])){
        require_once '../../Database/db.php';
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            header("location: ../newpassword.php?error=passwordNotMatch");
                exit();
        }else{
            $code = 0;
            $email = $_SESSION['usersEmail']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET usersOtp = $code, usersPassword = '$encpass' WHERE usersEmail = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){     
                  header("location: ../LogIn.php?msg=changePwdSuccess");
                exit();
            }else{
                  header("location: ../newpassword.php?error=stmtFailed");
                exit();
            }
        }
    }
?>