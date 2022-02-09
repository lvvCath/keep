<?php
/*The following db.php file has to connect the API with the Database.*/
    $db_name = "cs005";
    $db_server = "127.0.0.1";
    $db_user = "root";
    $db_pass = "";

    $hostname = 'localhost';

    $db = new PDO("mysql:host={$db_server};dbname={$db_name};charset=utf8",
    $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name);
    $con = mysqli_connect($db_server, $db_user, $db_pass, $db_name) or die("Error " . mysqli_error($con));

?>