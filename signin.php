<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
if(isSignedIn())
{
    header('location:index.php');
}
if(isset($_POST['submit']))
{
    $username=$_POST['userName'];
    $password=$_POST['password'];
    signin($username,$password);
   // header('location:signin.php');
   // exit();
}

    echo'<div class="login">
<form action="" method="post">
<p id="error">'.printError().'</p>
<p><input type="text" name="userName" placeholder="type your name"/></p>
<p><input type="password" name="password" placeholder="type your password"/></p>
<input type="submit" value="login" name="submit"/>
</form>
</div>';

include 'layout/footer.php';
?>
