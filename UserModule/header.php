<nav class="page-header navbar navbar-expand-lg navbar-light shadow bg-body rounded h-navbar">
  <div class="container-fluid d-flex">
    <a class="navbar-brand" href="#">
    <img src="../assets/images/icon.png" alt="" width="30" height="30" class="d-inline-block align-text-top"> 
    &nbspK E E P
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