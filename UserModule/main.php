<?php
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) {
    header('location: ../index.php');
    exit();
}
?>

<head>
    <!-- CSS -->
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
        <div class="container-fluid gedf-wrapper">
                
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->
            <!-- INSERT CONTENT HERE -->

        </div>

</body>


