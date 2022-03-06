<?php 
session_start();
require_once '../../Database/db.php';

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
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
          echo "<script> alert('Correct OTP.Please create a new password')
                window.location.href = '../newpassword.php';
            </script>";
        }else{
           echo "<script> alert('Incorrect OTP')
                window.location.href = '../otp-verification.php';
            </script>";
        }
    }
    //if user click change password button
    if(isset($_POST['change-password'])){
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
             echo "<script> alert('Confirm password not matched!')
                window.location.href = '../newpassword.php';
            </script>";
        }else{
            $code = 0;
            $email = $_SESSION['usersEmail']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET usersOtp = $code, usersPassword = '$encpass' WHERE usersEmail = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                 echo "<script> alert('Your password changed. Now you can login with your new password.!')
                window.location.href = '../logIn.php';
            </script>";
            }else{
                  echo "<script> alert('Failed to change your password!')
                window.location.href = '../newpassword.php';
            </script>";

            }
        }
    }
?>