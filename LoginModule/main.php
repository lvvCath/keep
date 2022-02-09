<?php
session_start();
?>

<h1>WELCOME!</h1>
<?php
if(isset($_SESSION["useruid"])){
    echo "<h2>Hello " . $_SESSION["useruid"] . "</h2>";
}
?>
<a href="includes/logout.inc.php">Logout</a>