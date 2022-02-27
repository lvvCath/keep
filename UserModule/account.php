<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../handler/error.php';?>
<?php include 'header.php';?>
<!-- external css -->
<link rel="stylesheet" href="css/account.css">
<div class="container d-flex justify-content-center flex-column mt-5">
    <div class="row g-5 p-3 mx-2">
    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title">General Account Settings</h4>
        <div class="hr"></div>
        <form class="row g-3 " id="createForm" name="createForm" method="POST" action="#">
        <div class="col-md-6">
            <label class="text-muted" for="first_name">First Name</label>
            <input class="form-control" id="first_name" name="first_name" type="text" required 
                    readonly value="<?php echo $row['usersFirstName']?>">
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="last_name">Last Name</label>
            <input class="form-control" id="last_name" name="last_name" type="text" required
                    readonly value="<?php echo $row['usersLastName']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="email">Email</label>
            <input class="form-control" id="email" name="email" type="text" required 
                    readonly value="<?php echo $row['usersEmail']?>"> 
        </div>
        <div class="col-12">
            <label class="text-muted" for="username">Username</label>
            <input class="form-control" id="username" name="username" type="text" required
                    readonly value="<?php echo $row['usersUid']?>">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="button" id="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa fa-edit"></i>&nbspE D I T</button>
        </div>
        </form>
    </div>

    <div class="col-12 shadow p-3 mb-5 bg-body rounded">
        <h4 class="title">Change Password</h4>
        <small id="passwordHelpBlock" class="form-text text-muted">
        It's a good idea to use a strong password that you're not using elsewhere <br>
        Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
        </small>
        <div class="hr"></div>        
        <form class="row g-3 " id="form" name="createForm" method="POST" action="includes/updatepwd.inc.php">
        <div class="col-12">
            <label class="text-muted" for="last_password">Current Password</label>
            <input class="form-control" id="last_password" name="last_password" type="password" required> 
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="new_password">New Password</label>
            <input class="form-control" id="new_password" name="new_password" type="password" required>
        </div>
        <div class="col-md-6">
            <label class="text-muted" for="con_password">Confirm New Password</label>
            <input class="form-control" id="con_password" name="con_password" type="password" required> 
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
        <h4 class="title" style="color: rgb(181 0 18);">DELETE ACCOUNT</h4>
        <p>Once you delete your account, there is no going back. Please be certain.</p>
        <div class="hr-red"></div>
        <div class="d-flex justify-content-center py-4">
           <button id="deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-primary">D E L E T E</button>
        </div>        
    </div>
    </div>
</div>

<!-- Modal Update -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="row g-3 " id="createForm" name="createForm" method="POST" action="includes/updateacc.inc.php">
            <div class="col-md-6">
                <label class="text-muted" for="first_name">First Name</label>
                <input class="form-control" id="first_name" name="first_name" type="text" required 
                         value="<?php echo $row['usersFirstName']?>">
            </div>
            <div class="col-md-6">
                <label class="text-muted" for="last_name">Last Name</label>
                <input class="form-control" id="last_name" name="last_name" type="text" required
                         value="<?php echo $row['usersLastName']?>"> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="text" required 
                         value="<?php echo $row['usersEmail']?>"> 
            </div>
            <div class="col-12">
                <label class="text-muted" for="username">Username</label>
                <input class="form-control" id="username" name="username" type="text" required
                         value="<?php echo $row['usersUid']?>">
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

<!-- Modal Update -->
<div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

<script>
$(document).ready(function() {    
if (window.location.hash) {
        setTimeout(function() {
            $('html, body').scrollTop(0).show();
            $('html, body').animate({
                scrollTop: $(window.location.hash).offset().top
                }, 1500)
        }, 0);
    }
    
});

function clearForm() {
    document.getElementById("form").reset();
}
</script>

<?php include 'footer.php';?>




