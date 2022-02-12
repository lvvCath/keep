<?php


if(isset($_POST["LoginBtn"])){
    $username = $_POST["uid"];
    $password = $_POST["password"];

    require_once '../../Database/db.php';
    require_once 'functions.inc.php';

   $ip_address=getUserIpAddr();  
   $time=time()-30; //30 sec  
   $check_attmp=mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(*) as 'total_count' from lock_user where login_count>$time and ip_address='$ip_address'"));  

   $total_count=$check_attmp['total_count'];  
   if ($total_count == 3) {  
    header("location: ../LogIn.php?error=lock_user");
        exit();
    }
    if(emptyInputLogin($username, $password) !== false){
        header("location: ../LogIn.php?error=emptyinput");
        exit();
    }
    
    loginUser($conn, $username, $password);

}else{
    header("location: ../LogIn.php");
    exit();
}
?>