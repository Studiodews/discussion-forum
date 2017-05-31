<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
if(!isSignedIn())
{
  header('location:./signin.php');
  exit();
}

if(isset($_POST['submit']))
{
    $catName=mysql_real_escape_string($_POST['catName']);
    $catDesc=mysql_real_escape_string($_POST['catDesc']);
     $sql="INSERT INTO fcategories (catName,catDesc)VALUES
         ('$catName','$$catDesc')";
         
       mysql_query($sql)or die("query failed ".mysql_error());  
}
else
{
    
}

include 'layout/footer.php';
?>