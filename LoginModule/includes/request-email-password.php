<?php  
require_once '../../Database/db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $code){
 
    require('../includes/PHPMailer/Exception.php'); 
    require('../includes/PHPMailer/PHPMailer.php');
    require('../includes/PHPMailer/SMTP.php');
    
$mail = new PHPMailer(true);

try {
    //Server settings

    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'keep.webpage@gmail.com';                     //SMTP username
    $mail->Password   = 'Qwerty12345!';                               //SMTP password
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;                           //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('keep.webpage@gmail.com','K E E P');
    $mail->addAddress($email);     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification Code';
    $mail->Body    = "We got a request from you to reset passsword ! <br>
    Your verification code is : $code <br>";


    $mail->send();
    return true;
} catch (Exception $e) {
    return false;
}
}
//if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['usersEmail']);
        $check_email = "SELECT * FROM users WHERE usersEmail='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 11111111);         
            date_default_timezone_set("Asia/Manila");
            $currenDate = date("Y-m-d");
            $insert_code = "UPDATE users SET usersOtp = $code, OtpDate = $currenDate WHERE usersEmail = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query && sendMail($email,$code)){
                 header("location: ../otp-verification.php?msg=OtpSent");
                exit();
         }else{
             header("location: ../forgot-password.php?error=FailedOtp");
                exit();
            }
    }else{
            header("location: ../forgot-password.php?error=EmailnotFound");
                exit();
}
    
}












    ?>