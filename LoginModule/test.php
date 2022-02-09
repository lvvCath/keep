<?php

$first_name = "Rosalyn";
$last_name = "Quenca";
$username = "Rosal_08";
$password = "Quenca*!23";
// if(preg_match("/\b{$first_name}\b/i", $password) || preg_match("/\b{$last_name}\b/i", $password) || preg_match("/\b{$username}\b/i", $password)) {
//     echo'<p>matched</p>';
// }


$password = strtolower($password);
$first_name = strtolower($first_name);
$last_name = strtolower($last_name);
$username = strtolower($username);
echo'<p>'.$password.'</p>';
echo'<p>'.$first_name.'</p>';
echo'<p>'.$last_name.'</p>';
echo'<p>'.$username.'</p>';

if(strpos($password, $first_name) !== false || strpos($password, $last_name) !== false || strpos($password, $username) !== false) {
    echo'<p>matched</p>';
}

?>