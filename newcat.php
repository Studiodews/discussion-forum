<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
if(!isSignedIn())
{
  header('location:./signin.php');
  exit();
}
include 'layout/footer.php';
?>