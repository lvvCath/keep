<?php
include('../Database/db.php'); 
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) { 
    header('location: ../index.php');
    exit();
}else{
     $id = $_SESSION["userid"];
}

$sql = "SELECT * FROM users  WHERE usersId = $id";
$stmt= mysqli_query($conn, $sql);
$row = mysqli_fetch_array($stmt);
$first_name = $row['usersFirstName'];
$last_name =  $row['usersLastName'];
$email = $row['usersEmail'];
$username =  $row['usersUid'];

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Online Portfoio</title>
    <!-- add icon link -->
    <link rel="icon" href="../assets/images/icon.png" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/header.css">
    <!-- Bootstrap CSS -->
    <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Fontawesome -->
    <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
    <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light shadow bg-body rounded">
      <div class="container-fluid d-flex">
        <a class="navbar-brand" href="#">
        <img src="../assets/images/icon.png" alt="" width="30" height="30" class="d-inline-block align-text-top"> 
        Online Portfolio
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav">
              <li class="nav-item px-2">
                <a class="nav-link h-portfolio" href="main.php"><span class="fa-solid fa-address-card"></span> Portfolio</a>
              </li>

              <li class="nav-item px-2">
                <div class="dropdown">
                  <a class="dropdown-toggle nav-link h-notif" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php
                      if($_SESSION["notifpwd"] == true) { 
                        echo  '<span class="fa-solid fa-bell">
                        <span class="position-absolute top-3 start-10 translate-middle p-1 bg-warning border border-light rounded-circle">
                          <span class="visually-hidden">New alerts</span>
                        </span>
                        </span>';
                      }else{
                        echo '<span class="fa-solid fa-bell"></span> ';
                      }
                    ?>
                  
                    Notification
                  </a>
                  <ul class="dropdown-menu notif text-center" aria-labelledby="dropdownMenuLink">
                    <?php
                      if($_SESSION["notifpwd"] == true) { 
                        echo  '<li><a class="dropdown-item">10 days before password expiration</a></li>';
                      }else{
                        echo ' <li>no notifs</li>';
                      }
                    ?>
                  </ul>
                </div>
              </li>

              <li class="nav-item px-2">
                <a class="nav-link h-account" href="account.php"><span class="fa-solid fa-gears"></span> Account</a>
              </li>
              <li class="nav-item px-2">
                <a class="nav-link h-logout" href="../LoginModule/includes/logout.inc.php"><span class="fa-solid fa-right-from-bracket"></span> Logout</a>
              </li>
              
            </ul>
        </div>

      </div>
    </nav>

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