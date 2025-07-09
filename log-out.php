<?php
session_start();
error_reporting();
unset($_SESSION['BMS_is_login_now']);
header('location:login.php');
?>