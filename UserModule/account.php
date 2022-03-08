<?php
include('../Database/db.php'); 
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) { 
    header('location: ../index.php');
    exit();
}else{
     $id = $_SESSION["userid"];
}
include('../UserModule/includes/fetch_acc_info.php');
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
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/account.css">
  <!-- Bootstrap CSS -->
  <link href="../bootstrap-5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Fontawesome -->
  <link href="../assets/fontawesome-free-6.0.0-web/css/fontawesome.css" rel="stylesheet">
  <link href="../assets/fontawesome-free-6.0.0-web/css/brands.css" rel="stylesheet">
  <link href="../assets/fontawesome-free-6.0.0-web/css/solid.css" rel="stylesheet">
  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    
  <?php include '../handler/error.php';?>
</head>

<body>
<?php include 'header.php';?>
<div class="container d-flex justify-content-center flex-column mt-5">
    <div class="row g-5 p-3 mx-2">

    <div class="col-12 restriction shadow p-3 mb-5 bg-body rounded">
        <h4 class="title"><i class="fa-solid fa-share-nodes"></i> Online Portfolio Share Settings</h4>
        <div class="hr"></div>
        <form class="row g-3">
        <div class="col-12">
            <label class="text-muted" for="share_link"><h5>Get Link</h5></label>
            <div class="input-group mb-3">
              <input class="form-control" id="share_link" name="share_link" type="text" value="" readonly>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" onclick="copyBtn()" type="button">Copy</button>
            </div>
          </div>
        </div>
        
        
        <div class="col-12">
            <h5>Set Restriction</h5>
            <div class="permission btn-group">
              <button type="button" class="btn-desc btn">
              <p id="btn-desc"></p>
              </button>
              <button id="dropdown-permission" type="button" class="btn btn-drop dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-caret-down"></i>
              </button>
              <ul class="dropdown-menu">
                <li class="row">
                  <div class="col-1">
                    <i id="fa-public-i" class="fa-solid fa-check"></i> 
                  </div>
                  <div class="col-10">
                    <a id="public" class="dropdown-item" href="#"> Public</a>
                  </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="row">
                  <div class="col-1">
                    <i id="fa-private-i" class="fa-solid fa-check"></i> 
                  </div>
                  <div class="col-10">
                    <a id="private" class="dropdown-item" href="#"> Private</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="col-12 d-flex mt-4 justify-content-end">
              <button id="genLinkBtn" class="btn btn-primary" type="button"><i class="fa fa-link"></i>&nbspGenerate link</button>
            </div>
            <div id="copiedmsg">
              <p>Link copied to clipboard!</p>
            </div>
            
        </div>

        </form>
    </div>

    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title"><i class="fa-solid fa-gear"></i> General Account Settings</h4>
        <div class="hr"></div>
        <form class="row g-3 ">
        <div class="col-md-6">
            <label class="text-muted" for="first_name">First Name</label>
            <input class="form-control" name="first_name" type="text"  
                    readonly value="<?php echo $row['usersFirstName']?>">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="last_name">Last Name</label>
            <input class="form-control" name="last_name" type="text" 
                    readonly value="<?php echo $row['usersLastName']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="email">Email</label>
            <input class="form-control"name="email" type="text"  
                    readonly value="<?php echo $row['usersEmail']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="username">Username</label>
            <input class="form-control" name="username" type="text" 
                    readonly value="<?php echo $row['usersUid']?>">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="button" id="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAccModal"><i class="fa fa-edit"></i>&nbspE D I T</button>
        </div>
        </form>
    </div>

    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title"><i class="fa-solid fa-lock"></i> Change Password</h4>
        <small class="form-text text-muted">
        It's a good idea to use a strong password that you're not using elsewhere <br>
        Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
        </small>

        <div class="hr"></div>        
        <form class="row g-3 " id="form" name="createForm" method="POST" action="includes/updatepwd.inc.php">
        <div class="col-12">
            <label class="text-muted" for="last_password">Current Password</label>
            <span class="pwd-eye" onclick="password_show_hide();">
                <i class="fa fa-eye" id="show_eye"></i>
                <i class="fa fa-eye-slash d-none" id="hide_eye"></i>
            </span>
            <input class="form-control" id="last_password" name="last_password" type="password" required> 
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="new_password">New Password</label>
            <input class="form-control" id="new_password" name="new_password" type="password" 
            onfocus="showValidation()"
            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[_\W]).{10,}" title="Please conform to the Password Policy."
            required>
            <small id="passwordHelpBlock"  class="form-text text-muted">
              <p id="pwd_letter" class="font-awesome-icons invalid">1 <b>Lowercase</b> letter</p>
              <p id="pwd_capital" class="font-awesome-icons invalid">1 <b>Uppercase</b> letter</p>
              <p id="pwd_number" class="font-awesome-icons invalid">1 <b>Number</b></p>
              <p id="pwd_symbol" class="font-awesome-icons invalid">1 <b>Special character</b></p>
              <p id="pwd_length" class="font-awesome-icons invalid">Minimum <b>10 characters</b></p>
            </small>
          </div>
        <div class="col-md-6">
            <label class="text-muted" for="con_password">Confirm New Password</label>
            <input class="form-control" id="con_password" name="con_password" type="password" 
              onfocus="conPasswordValidation()"
                required>
            <small id="conpasswordHelpBlock"  class="form-text text-muted">
                <p id="conpwd_match" class="font-awesome-icons invalid">Password does not match</p>
            </small>
        </div>
        <!-- buttons -->
        <div class="col-md-6 d-flex justify-content-center">
            <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>   
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <button type="submit" id="createBtn" name="submit" class="btn btn-primary">C O N F I R M</button>      
        </div>   
        </form>
    </div>

    <div id="deleteAccount" class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title" style="color: rgb(181 0 18);"><i class="fa-solid fa-user-xmark"></i> DELETE ACCOUNT</h4>
        <p>Once you delete your account, there is no going back. Please be certain.</p>
        <div class="hr-red"></div>
        <div class="d-flex justify-content-center py-4">
           <button id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-primary">D E L E T E</button>
        </div>        
    </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="updateAccModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateAccModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateAccModalLabel">Update Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 " id="createForm" name="createForm" method="POST" action="includes/updateacc.inc.php">
            <div class="col-md-6">
                <label class="text-muted" for="first_name">First Name</label>
                <input class="form-control" id="first_name" name="first_name" type="text" required 
                      pattern="^[a-zA-Z\s]*$"
                      title="Name should only contain letters and whitespace."
                      value="<?php echo $row['usersFirstName']?>">
            </div>
            <div class="col-md-6">
                <label class="text-muted" for="last_name">Last Name</label>
                <input class="form-control" id="last_name" name="last_name" type="text" required
                      pattern="^[a-zA-Z\s]*$"
                      title="Name should only contain letters and whitespace."
                      value="<?php echo $row['usersLastName']?>"> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text" required 
                      pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$"
                      title="Please enter a valid Email (example@domain.com)"
                      value="<?php echo $row['usersEmail']?>"> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" required
                      value="<?php echo $row['usersUid']?>"
                      onfocus="uidValidation()"
                      pattern="[a-zA-Z][0-9a-zA-Z_]{4,19}[0-9a-zA-Z]" 
                      title="Please conform to the Username requirements."
                      required>
                <small id="usernameHelpBlock"  class="form-text text-muted">
                  <p>	Must be at least (6-20) char long, which can consist of letters (a-z A-Z), numbers (0-9), and underscore (_)</p>
                  <p id="uid_firstChar" class="font-awesome-icons invalid">first character should be a <b>letter</b></p>
                  <p id="uid_lastChar" class="font-awesome-icons invalid">Last letter can be a <b>letter/number</b></p>
                  <p id="uid_space" class="font-awesome-icons invalid">No <b>Whitespace</b></p>
                  <p id="uid_length" class="font-awesome-icons invalid">username length <b>6-20 characters</b></p>
                </small>
            </div>
            <div class="hr"></div>
            <h5>Enter your password to confirm changes</h5>
            <div class="col-12">
                <label class="text-muted" for="ver_password">Password</label>
                <span class="pwd-eye" onclick="ver_password_show_hide();">
                    <i class="fa fa-eye" id="show_eye_v"></i>
                    <i class="fa fa-eye-slash d-none" id="hide_eye_v"></i>
                </span>
                <input class="form-control" id="ver_password" name="ver_password" type="password" required> 
            </div>
            <!-- buttons -->
            <div class="col-md-6 d-flex justify-content-center">
                <button type="button" id="clearBtn" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>   
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <button type="submit" id="createBtn" name="update" class="btn btn-primary">Update</button>      
            </div> 
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal-content-red">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><i class="fa-solid fa-warning" style="color: rgb(181 0 18);"></i> <strong>This is extremely important!</strong></p>
        <p>Your account will be deleted along with <strong>everything</strong>, your personal information, contact details and portfolio.</p>
        <div class="hr-red"></div>
        <form class="row g-3 " id="deleteAccountForm" name="deleteAccountForm" method="POST" action="includes/deleteacc.inc.php">
            <div class="col-12">
                <label class="text-muted" for="uid">Email or Username</label>
                <input class="form-control" id="uid" name="uid" type="text" required> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="password">Password</label>
                <span class="pwd-eye" onclick="modal_password_show_hide();">
                    <i class="fa fa-eye" id="show_eye_m"></i>
                    <i class="fa fa-eye-slash d-none" id="hide_eye_m"></i>
                </span>
                <input class="form-control" id="password" name="password" type="password" required> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="deleteverify">To verify, type <strong><i>delete my account</i></strong> below:</label>
                <input class="form-control" id="deleteverify" name="deleteverify" type="text" required>
            </div>
            <!-- buttons -->
            <div class="col-md-6 d-flex justify-content-center">
                <button type="button" id="clearBtn" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>   
            </div>
            <div class="col-md-6 d-flex justify-content-center">
                <button type="submit" id="deleteAccountBtn" name="deleteAccountBtn" class="btn btn-primary">DELETE Account</button>      
            </div> 
        </form>
      </div>
    </div>
  </div>
</div>




<!-- To Top -->
<button onclick="topFunction()" id="toTop" title="Go to top"><i class="fa fa-chevron-up"></i></button>
<script src="js/account.js"></script>
<script src="PortfolioCRUD/share.ajax.js"></script>

<?php include 'footer.php';?>




