<?php

session_start();
include '../DBCon.php';
$username = $_POST['username'];
$password = $_POST['password'];

if ($username != NULL) {
    if ($username == "admin" && $password == "morasp5") {
        $_SESSION['username'] = 'admin';
        header('location:../score.php');
    } else {
        header('location:../signin.php');
    }
} else {
    header('location:../signin.php');
}
?>
