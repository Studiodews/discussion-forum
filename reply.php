<?php
include_once'includes/loginFunctions.php';
if(isSignedIn())
{
    if(isset($_POST['submit']))
    {
        $topicID=mysql_real_escape_string($_POST['$topicID']);
        $author=mysql_real_escape_string($_SESSION['userID']);
        $postCont=mysql_real_escape_string($_POST['reply']);
        
        $sql="INSERT INTO fposts (postContent,postDate,postTopic,author)VALUES
                ('$postCont',NOW(),'$topicID','$author') ";
        mysql_query($sql)or die("query failed ".mysql_error());
        header('location:topic.php?id='.$topicID);
        exit();
    }
    else
    {
       echo '<form action="reply.php" method="post">
       <input type="hidden" name="$topicID" value="'.$_GET['id'].'" /> 
<textarea name="reply" rows="5" cols="50" placeholder="type to reply"></textarea>
<br />
<input type="submit" value="reply" name="submit" />
</form> ';
    }
}
?>
