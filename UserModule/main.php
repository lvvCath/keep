<?php
session_start();
if (!isset($_SESSION["userid"]) ||(trim ($_SESSION["userid"]) == '')) {
    header('location: ../index.php');
    exit();
}
?>

<h1>WELCOME!</h1>
<?php
if(isset($_SESSION["useruid"])){
    echo "<h2>Hello " . $_SESSION["useruid"] . "</h2>";
}
?>
<a href="../LoginModule/includes/logout.inc.php">Logout</a>