<?php
session_start();

if(isset($_SESSION["useruid"])){
    $debug = strval($_SESSION["debug"]);
    echo "<h2> DEBUG::" .  $_SESSION["debug"] . "</h2>";
    echo "<h2> DEBUG::" .  $_SESSION["debug1"] . "</h2>";
    echo "<h2> DEBUG::" .  $_SESSION["debug2"] . "</h2>";
    echo "<h2> DEBUG::" .  $_SESSION["debug3"] . "</h2>";
}

?>