<?php

session_start();
session_unset();
session_destroy();

session_regenerate_id(TRUE);

header('location: ../../index.php');
exit();

