<?php

session_start();
unset($_SESSION['car_user']);
session_destroy();
header('location:index.php');

?>