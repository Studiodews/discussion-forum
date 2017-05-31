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
         ('$catName','$catDesc')";
         
       mysql_query($sql)or die("query failed ".mysql_error()); 
       header('location:./');
        exit();
}
else
{
    echo '<form action="" method="post" id="newCat">
    <p><label><strong>Category Name </strong></label> <input type="text" placeholder="enter category name " name="catName" /></p>
    <strong>Category Description </strong></label>
    <p><textarea name="catDesc" rows="8" cols="60" placeholder="Type category description "></textarea></p>
    <input type="submit" name="submit" value="submit" id="button" />
    </form>';
}

include 'layout/footer.php';
?>
