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
    $topicName=mysql_real_escape_string($_POST['topicName']);
    $topicSubject=mysql_real_escape_string($_POST['topicSubject']);
    $author=$_SESSION['userID'];
    $cat=mysql_real_escape_string($_POST['topicCat']);
     $sql="INSERT INTO ftopics (topicTitle,topicSubject,topicDate,topicCat,author)VALUES
         ('$topicName','$topicSubject',NOW(),'$cat','$author')";
         
       mysql_query($sql)or die("query failed ".mysql_error()); 
       header('location:./');
        exit();
}
else
{
    echo '<form action="" method="post" id="newCat">
    <p><label><strong>Title </strong></label> <input type="text" placeholder="type topic title" name="topicName" /></p>
    <p><label><strong>Category </strong></label> <select name="topicCat">';
    $sql="SELECT * FROM fcategories ";
    $result= mysql_query($sql)or die("query failed ".mysql_error()); 
    while($row=mysql_fetch_assoc($result))
    {
        echo '<option value="'.$row[catID].'">'.$row['catName'].'</option>';
    }
    echo'</select></p>
    <p><textarea name="topicSubject" rows="15" cols="80" placeholder="Subject"></textarea></p>
    <input type="submit" name="submit" value="submit" id="button" />
    </form>';
}

include 'layout/footer.php';
?>
