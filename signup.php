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
    $username=mysql_real_escape_string($_POST['userName']);
    $password=mysql_real_escape_string($_POST['password']);
    $password2=mysql_real_escape_string($_POST['passwordAgain']);
    $email=mysql_real_escape_string($_POST['email']);
    if($password != $password2)
    {
        $error[]="unmatched passwords";
    }
    else
    {
      $password=md5($password);
      $sql="INSERT INTO fusers (userName,password,email,joinDate,userLevel) VALUES
           ('$username','$password','$email',NOW(),1)";
     $ret= mysql_query($sql);
     if($ret)
     {
        $error[]="Successfully registered. you can now <a href=\"sign.pnp\">sign in</a>";
     }
     else
     {
        $error[]="try another name please .";
     }   
    }
   // signin($username,$password);
   // header('location:signin.php');
   // exit();
}

    echo'<div class="login">
<form action="" method="post">
<p id="error">'.printError().'</p>
<p><input type="text" name="userName" placeholder="type your name"/></p>
<p><input type="password" name="password" placeholder="type your password"/></p>
<p><input type="password" name="passwordAgain" placeholder="type your password again"/></p>
<p><input type="text" name="email" placeholder="type your email"/></p>
<input type="submit" value="register" name="submit"/>
</form>
</div>';

include 'layout/footer.php';
?>
