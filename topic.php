<?php
include'includes/loginFunctions.php';
include 'layout/header.php';
include 'layout/navigation.php';
if(isset($_GET['id']))
{
    $topicID=mysql_real_escape_string($_GET['id']);
    $sql="SELECT ftopics.topicTitle,
                ftopics.topicDate,
                ftopics.topicSubject,
                fusers.userName
                From ftopics , fusers WHERE ftopics.author=fusers.userID AND ftopics.topicID=$topicID";
                $result= mysql_query($sql)or die("query failed ".mysql_error());
                if(mysql_num_rows($result)==1)
                {
                    $row=mysql_fetch_assoc($result);
                    echo "<table ><tr><td>{$row['topicTitle']} By {$row['userName']} At ".date('d-m-Y', strtotime($row['topicDate']))."</td></tr>";
                echo "<tr id=\"content\" ><td>{$row['topicSubject']}</td></tr></table>";
                }
                
                $sql="SELECT fposts.postContent,
                    fposts.postTopic,
                    fposts.postDate,
                    fposts.author,
                    fusers.userName,
                    fusers.userID
                    FROM
                    fposts LEFT JOIN  fusers ON fposts.author=fusers.userID
                    WHERE fposts.postTopic = $topicID";
                    $result= mysql_query($sql)or die("query failed ".mysql_error());
                    while( $row=mysql_fetch_assoc($result))
                    {
                        echo "<table  id=\"post\"><tr><td>By {$row['userName']} At ".date('d-m-Y', strtotime($row['postDate']))."</td></tr>";
                echo "<tr id=\"content\" ><td>{$row['postContent']}</td></tr></table>";
                    }
                    
 include 'reply.php';             
}

include 'layout/footer.php';
?>