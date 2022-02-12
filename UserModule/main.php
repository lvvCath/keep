<?php
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) {
    header('location: ../index.php');
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/main.css">
</head>


<body>
    <div class="wrapper">
        <!-- Insert sideNav -->
        <div id="sideNav"><?php include 'nav.php';?></div>
        <div class="main_content">

    <!-- Top Nav -->
            <div class="sticky">
                <div class="navbar navbar-light bg-white">
                    <div class="search navbar-left"><h4>Account</h4></div>
                    <div class="search navbar-right">
                        <!-- <i class="fa fa-search"></i>
                        <input class="searchInp" type="text" placeholder="Search Post">
                        <input name="search" class="searchBtn" type="submit" value="Search"> -->
                    </div>
                    <i class="icon-right fa fa-envelope"></i>
                    <i class="icon-right fa fa-bell"></i>
                    <i class="icon-right fa fa-navicon"></i>
                </div>  
            </div> 
    <!-- /Top Nav -->

            
    <!-- Body -->
        <div class="container-fluid">
            <div class="panel">
                <h4 class="title">General Account Settings</h4>
                <hr style="height:5px; background-color: #045de9;background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">
                <form id="createForm" name="createForm" method="POST" action="includes/signup.inc.php">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label class="text-muted" for="first_name">First Name</label>
                                <input class="form-control" id="first_name" name="first_name" type="text" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="text-muted" for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" name="last_name" type="text" required> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="text-muted" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" required> 
                    </div>

                    <div class="form-group">
                        <label class="text-muted" for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="edit" class="btn btn-primary" onclick="clearForm()"><i class="fa fa-edit"></i>&nbspE D I T</button>
                    </div>
                </form>
            </div>

            <div class="panel">
                <h4 class="title">Change Password</h4>
                <small id="passwordHelpBlock" class="form-text text-muted">
                It's a good idea to use a strong password that you're not using elsewhere <br>
                Password must be at least (10) characters long, which consist of at least (1) upper case letter, (1) lower case letter, (1) number and (1) special character.
                </small>
                <hr style="height:5px; background-color: #045de9;background-image: linear-gradient(315deg, #045de9 0%, #09c6f9 74%);">
                <form id="createForm" name="createForm" method="POST" action="includes/changepass.inc.php">
                    <div class="form-group">
                        <label class="text-muted" for="last_password">Current Password</label>
                        <input class="form-control" id="last_password" name="last_password" type="password" required> 
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label class="text-muted" for="new_password">New Password</label>
                                <input class="form-control" id="new_password" name="new_password" type="password" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="text-muted" for="con_password">Confirm New Password</label>
                                <input class="form-control" id="con_password" name="con_password" type="password" required> 
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="d-flex justify-content-end">
                        <button type="button" id="clearBtn" class="btn btn-primary" onclick="clearForm()">C L E A R</button>
                        <button type="submit" id="createBtn" name="submit" class="btn btn-primary">C O N F I R M</button>
                    </div>
                        
                </form>
            </div>
        </div>

        </div>
        

        
        <!-- /Body End-->
        </div> <!-- /main_content  -->
    </div> <!-- /wrapper  -->


<!-- Modal Update Form -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title align-middle" id="updateModalLabel">Update Report Status</h4>
                </div>
                <div class="modal-body">
                    <form id="updateForm" name="updateForm" method="POST">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">    
                                <label class="text-muted" for="status_u">Status</label> <br>
                                <select class="custom-select custom-select-lg mb-5" id="status_u">
                                    <option selected>Select</option>
                                    <option value="On-Going">On-Going</option>
                                    <option value="Solved">Solved</option>
                                </select>
                            </div> 
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateBtn_report" >Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="PdfDataHolder" hidden>
        <form id="pdfForm" name="pdfForm" method="POST" action="../Database/ReportCRUD/report_pdf.php">
            <div class="form-row">
                <input id="case_no_pdf" type="text" >
                <input id="complainant_pdf" type="text" >
                <input id="c_address_pdf" type="text" >
                <input id="respondent_pdf" type="text" >
                <input id="r_address_pdf" type="text" >
                <input id="complain_pdf" type="text" >
                <input id="date_time_pdf" type="text" >
            </div>
        </form>
    </div>

</body>




